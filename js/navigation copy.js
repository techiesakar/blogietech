/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
	const siteNavigation = document.getElementById('site-navigation');
	const mobileNavigation = document.getElementById('mobile-navigation');

	// Return early if the navigation don't exist.
	if (!siteNavigation) {
		return;
	}

	if (!mobileNavigation) {
		return;
	}

	const button = siteNavigation.getElementsByTagName('button')[0];

	const mobilebutton = mobileNavigation.getElementsByTagName('button')[0];

	// Return early if the button don't exist.
	if ('undefined' === typeof button) {
		return;
	}

	// Return early if the mobile button don't exist.
	if ('undefined' === typeof mobilebutton) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName('ul')[0];

	const mobilemenu = mobileNavigation.getElementsByTagName('ul')[0];

	// Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof menu) {
		button.style.display = 'none';
		return;
	}

	//for mobile Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof mobilemenu) {
		mobilebutton.style.display = 'none';
		return;
	}

	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	}
	// for mobile
	if (!mobilemenu.classList.contains('nav-menu')) {
		mobilemenu.classList.add('nav-menu');
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener('click', function () {
		siteNavigation.classList.toggle('toggled');

		if (button.getAttribute('aria-expanded') === 'true') {
			button.setAttribute('aria-expanded', 'false');
		} else {
			button.setAttribute('aria-expanded', 'true');
		}
	});

	// mobile Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	mobilebutton.addEventListener('click', function () {
		mobileNavigation.classList.toggle('toggled');

		if (mobilebutton.getAttribute('aria-expanded') === 'true') {
			mobilebutton.setAttribute('aria-expanded', 'false');
		} else {
			mobilebutton.setAttribute('aria-expanded', 'true');
		}
	});

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener('click', function (event) {
		const isClickInside = siteNavigation.contains(event.target);

		if (!isClickInside) {
			siteNavigation.classList.remove('toggled');
			button.setAttribute('aria-expanded', 'false');
		}
	});

	// mobile Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener('click', function (event) {
		const isClickInside = mobileNavigation.contains(event.target);

		if (!isClickInside) {
			mobileNavigation.classList.remove('toggled');
			mobilebutton.setAttribute('aria-expanded', 'false');
		}
	});

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName('a');

	// Mobile Get all the link elements within the menu.
	const mobilelinks = mobilemenu.getElementsByTagName('a');

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

	//Mobile Get all the link elements with children within the menu.
	const mobilelinksWithChildren = mobilemenu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

	// Toggle focus each time a menu link is focused or blurred.
	for (const link of links) {
		link.addEventListener('focus', toggleFocus, true);
		link.addEventListener('blur', toggleFocus, true);
	}
	//Mobile Toggle focus each time a menu link is focused or blurred.
	for (const mobilelink of mobilelinks) {
		mobilelink.addEventListener('focus', toggleFocus, true);
		mobilelink.addEventListener('blur', toggleFocus, true);
	}
	// Toggle focus each time a menu link with children receive a touch event.
	for (const link of linksWithChildren) {
		link.addEventListener('touchstart', toggleFocus, false);
	}

	//mobile Toggle focus each time a menu link with children receive a touch event.
	for (const mobilelink of mobilelinksWithChildren) {
		mobilelink.addEventListener('touchstart', toggleFocus, false);
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if (event.type === 'focus' || event.type === 'blur') {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (!self.classList.contains('nav-menu')) {
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					self.classList.toggle('focus');
				}
				self = self.parentNode;
			}
		}
	}
}());

function openDesktopSearch() {
	var openDesktopSearch = document.getElementById("searchDesktopOverlay");
	openDesktopSearch.classList.toggle("active");
	var searchDesktopContainer = document.getElementById("searchDesktopContainer");
	searchDesktopContainer.classList.toggle("active");
	var autofocusdesktop = document.getElementById("search-input");
	setTimeout(() => autofocusdesktop.focus(), 100);

}

function openMobileSearch() {
	var openMobileSearch = document.getElementById("searchMobileOverlay");
	openMobileSearch.classList.toggle("active");
	var searchMobileContainer = document.getElementById("searchMobileContainer");
	searchMobileContainer.classList.toggle("active");
	var autofocusmobile = document.getElementById("search-input");
	setTimeout(() => autofocusmobile.focus(), 190);
}

function closeMenu() {
	const closeMenuContainer = document.getElementById('mobile-navigation');
	closeMenuContainer.classList.remove("toggled");
}

// For Onscroll Navbar

var prevScrollpos = window.pageYOffset;
const desktopTopHeader = document.getElementById('desktopTopHeader');
const desktopSubHeader = document.getElementById('desktopSubHeader');
const mobile = document.getElementById('mobile');

window.onscroll = function () {
	var currentScrollPos = window.pageYOffset;


	if (prevScrollpos > currentScrollPos) {
		desktopSubHeader.classList.add("scrolled");
		mobile.style.top = "0";

	} else {
		desktopSubHeader.classList.remove("scrolled");
		mobile.classList.remove("scrolled");
		mobile.style.top = "-100px";

	}

	if (window.pageYOffset > 1) {
		desktopTopHeader.classList.add("scrolled");

	} else {
		desktopTopHeader.classList.remove("scrolled");
		desktopSubHeader.classList.remove("scrolled");

	}
	prevScrollpos = currentScrollPos;

	// for scroll indicator
	scrollIndicator()

	function scrollIndicator() {
		var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
		var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
		var scrolled = (winScroll / height) * 100;
		document.getElementById("scrollIndicator").style.width = scrolled + "%";
	}
	const scroll2Top = document.getElementById("scroll2Top");
	if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
		scroll2Top.style.display = "flex";
	} else {
		scroll2Top.style.display = "none";
	}
}

// Scroll To Top
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

// Jquery