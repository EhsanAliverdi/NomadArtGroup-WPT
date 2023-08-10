//region Side menu
jQuery(document).ready(function($) {
	$('#menuOpenBtn').on('click', function(e) {
		e.stopPropagation(); // Stop event propagation
		$('#menuHolder').addClass('open'); // Add "open" class to show the menu
		$('.overlay').show(); // Show the overlay
	});

	$(document).on('click', function(e) {
		if (!$('#menuHolder').is(e.target) && $('#menuHolder').has(e.target).length === 0) {
			$('#menuHolder').removeClass('open'); // Remove "open" class to hide the menu
			$('.overlay').hide(); // Hide the overlay
		}
	});
});
//Close menu when Close Button is clicked
jQuery(document).ready(function($) {
	$('#menuCloseBtn').click( function(){
		console.log('close Button is clicked');
			$('#menuHolder').removeClass('open'); // Remove "open" class to hide the menu
			$('.overlay').hide(); // Hide the overlay
	});

});

document.addEventListener('DOMContentLoaded', function() {
	let expandIcons = document.querySelectorAll("#menu-main-menu > li.dropdown.nav-item > a > .expand-icon");
	expandIcons.forEach(function(icon) {
		icon.addEventListener('click', function() {
			console.log("added event listener for:");
			console.log(icon);
			var parentElement = icon.parentElement.parentElement;
			if (parentElement) {
				var ulElements = parentElement.querySelectorAll('ul');
				var ulElement = ulElements[0];
				if (ulElement) {
					if (ulElement.style.display === 'none') {
						ulElement.style.display = 'block';
					} else {
						ulElement.style.display = 'none';
					}
				}
			}
		});
	});
});
//endregion