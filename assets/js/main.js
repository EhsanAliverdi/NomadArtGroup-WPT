let menuHolder = document.getElementById('menuHolder')
let siteBrand = document.getElementById('siteBrand')
function menuToggle(){
	if(menuHolder.className === "drawMenu") menuHolder.className = ""
	else menuHolder.className = "drawMenu"
}


let expandIcons = document.querySelectorAll("#menu-main > li.dropdown.nav-item > a > .expand-icon");

expandIcons.forEach(function(icon) {
	icon.addEventListener('click', function() {
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
