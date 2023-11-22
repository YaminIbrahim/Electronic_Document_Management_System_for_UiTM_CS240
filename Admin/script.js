// SIDEBAR DROPDOWN
//The code selects all elements with the class "side-dropdown" inside the sidebar.
//It adds a click event listener to the first child anchor tag of each dropdown item.
//When the anchor tag is clicked, it toggles the "active" class on itself and the corresponding dropdown item to show or hide the dropdown content.
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
const sidebar = document.getElementById('sidebar');

allDropdown.forEach(item=> {
	const a = item.parentElement.querySelector('a:first-child');
	a.addEventListener('click', function (e) {
		e.preventDefault();

		if(!this.classList.contains('active')) {
			allDropdown.forEach(i=> {
				const aLink = i.parentElement.querySelector('a:first-child');

				aLink.classList.remove('active');
				i.classList.remove('show');
			})
		}

		this.classList.toggle('active');
		item.classList.toggle('show');
	})
})



// SIDEBAR COLLAPSE
//The code selects the toggle button for the sidebar and all elements with the class "divider" inside the sidebar.
//If the sidebar has the "hide" class, it sets the text content of all dividers to "-" and removes the "active" class from all dropdown anchor tags.
//When the toggle button is clicked, it toggles the "hide" class on the sidebar and performs similar actions as above based on the new state of the sidebar.
const toggleSidebar = document.querySelector('nav .toggle-sidebar');
const allSideDivider = document.querySelectorAll('#sidebar .divider');

if(sidebar.classList.contains('hide')) {
	allSideDivider.forEach(item=> {
		item.textContent = '-'
	})
	allDropdown.forEach(item=> {
		const a = item.parentElement.querySelector('a:first-child');
		a.classList.remove('active');
		item.classList.remove('show');
	})
} else {
	allSideDivider.forEach(item=> {
		item.textContent = item.dataset.text;
	})
}

toggleSidebar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');

	if(sidebar.classList.contains('hide')) {
		allSideDivider.forEach(item=> {
			item.textContent = '-'
		})

		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
	} else {
		allSideDivider.forEach(item=> {
			item.textContent = item.dataset.text;
		})
	}
})

//The code adds mouseenter and mouseleave event listeners to the sidebar.
//If the sidebar has the "hide" class, it performs similar actions as in the sidebar collapse section to show or hide the appropriate content when the mouse enters or leaves the sidebar.
sidebar.addEventListener('mouseleave', function () {
	if(this.classList.contains('hide')) {
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
		allSideDivider.forEach(item=> {
			item.textContent = '-'
		})
	}
})

sidebar.addEventListener('mouseenter', function () {
	if(this.classList.contains('hide')) {
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
		allSideDivider.forEach(item=> {
			item.textContent = item.dataset.text;
		})
	}
})




// PROFILE DROPDOWN
//The code selects the profile image, the dropdown element, and the dropdown link inside the profile element.
//When the profile image is clicked, it toggles the "show" class on the dropdown element to show or hide the dropdown content.
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
	dropdownProfile.classList.toggle('show');
})




// MENU
//The code selects all elements with the class "menu" inside the content area.
//It adds a click event listener to each menu item's icon.
//When the icon is clicked, it toggles the "show" class on the corresponding menu link to show or hide the menu content.
const allMenu = document.querySelectorAll('main .content-data .head .menu');

allMenu.forEach(item=> {
	const icon = item.querySelector('.icon');
	const menuLink = item.querySelector('.menu-link');

	icon.addEventListener('click', function () {
		menuLink.classList.toggle('show');
	})
})




//The code adds a click event listener to the window object.
//It checks if the clicked element is not the profile image or the profile dropdown.
//If the profile dropdown is shown and the click is outside of it, it hides the dropdown by removing the "show" class.
//It performs a similar check for each menu item and hides the menu content if the click is outside of it.
window.addEventListener('click', function (e) {
	if(e.target !== imgProfile) {
		if(e.target !== dropdownProfile) {
			if(dropdownProfile.classList.contains('show')) {
				dropdownProfile.classList.remove('show');
			}
		}
	}

	allMenu.forEach(item=> {
		const icon = item.querySelector('.icon');
		const menuLink = item.querySelector('.menu-link');

		if(e.target !== icon) {
			if(e.target !== menuLink) {
				if (menuLink.classList.contains('show')) {
					menuLink.classList.remove('show')
				}
			}
		}
	})
})



// PROGRESSBAR
//The code selects all elements with the class "progress" inside the cards.
//It sets the CSS custom property "--value" to the value specified in the "data-value" attribute of each progress element.
const allProgress = document.querySelectorAll('main .card .progress');

allProgress.forEach(item=> {
	item.style.setProperty('--value', item.dataset.value)
})



// APEXCHART
//The code defines an options object for configuring an ApexChart.
//It specifies the series data, chart type, height, data labels, stroke, x-axis type and categories, and tooltip format.
//It creates a new ApexChart instance using the specified options and renders it in the element with the ID "chart".
var options = {
  series: [{
  name: 'series1',
  data: [31, 40, 28, 51, 42, 109, 100]
}, {
  name: 'series2',
  data: [11, 32, 45, 32, 34, 52, 41]
}],
  chart: {
  height: 350,
  type: 'area'
},
dataLabels: {
  enabled: false
},
stroke: {
  curve: 'smooth'
},
xaxis: {
  type: 'datetime',
  categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
},
tooltip: {
  x: {
    format: 'dd/MM/yy HH:mm'
  },
},
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();