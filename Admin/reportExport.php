<?php
    // import database connection file
include("../Dbconn.php");

    // Function to clean data for CSV export
function cleanData($data) {
        // If the value contains a comma, newline, or double quote, enclose it in double quotes and escape existing double quotes
    if (strpos($data, ',') !== false || strpos($data, "\n") !== false || strpos($data, '"') !== false) {
        $data = '"' . str_replace('"', '""', $data) . '"';
    }
    return $data;
}

    // Function to export data to CSV
function exportToCSV($filename, $data) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);

    $output = fopen('php://output', 'w');

        // Output header row
    fputcsv($output, array('No', 'Student ID', 'Full Name', 'Email', 'Phone Number', 'Supervisor', 'Examiner', 'Class'));

        // Output data rows
    $count = 1;
    foreach ($data as $row) {
        $rowData = array($count, $row["studID"], $row["studName"], $row["studEmail"], $row["studPhoneNum"], $row["supervisor_name"], $row["examiner_name"], $row["classID"]);
        $rowData = array_map("cleanData", $rowData);
        fputcsv($output, $rowData);
        $count++;
    }

    fclose($output);
    exit();
}

    // Check if className parameter is provided in the URL
if (isset($_GET['className'])) {
    $className = $_GET['className'];

        // Fetch students for the current class with supervisor and examiner names
    $sqlStudents = "SELECT s.studID, s.studName, s.studEmail, s.studPhoneNum, 
    COALESCE(sv.lectName, ad1.adminName, 'No Supervisor assigned') AS supervisor_name,
    COALESCE(ex.lectName, ad2.adminName, 'No Examiner assigned') AS examiner_name,
    s.classID
    FROM student s
    LEFT JOIN lecturer sv ON s.studSV = sv.lectID
    LEFT JOIN lecturer ex ON s.studExam = ex.lectID
    LEFT JOIN admin ad1 ON s.studSV = ad1.adminID
    LEFT JOIN admin ad2 ON s.studExam = ad2.adminID
    WHERE s.classID = '$className'";

    $resultStudents = mysqli_query($connection, $sqlStudents);

    $data = array();

    while ($row = mysqli_fetch_array($resultStudents)) {
        $data[] = $row;
    }

        // Export the data to CSV file
    exportToCSV("report_" . $className . ".csv", $data);
}
?>
