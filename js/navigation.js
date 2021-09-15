canvasClose = document.getElementById('canvasClose');
canvasContainer = document.getElementById('canvasBackground');
const mobileButton = document.getElementById('menuToggle');
mobileButton.addEventListener('click', function () {
  canvasContainer.classList.toggle('toggled');

  if (mobileButton.getAttribute('aria-expanded') === 'true') {
    mobileButton.setAttribute('aria-expanded', 'false');
  } else {
    mobileButton.setAttribute('aria-expanded', 'true');
  }
});

canvasClose.addEventListener('click', function () {
  canvasContainer.classList.remove('toggled');
});

// For Day Night Mode
const dayNightToggler = document.getElementById('dayNightToggler');
dayNightToggler.addEventListener('click', function () {
  dayNightToggler.classList.toggle('toggled');
  document.body.classList.toggle('night-mode');
  if (document.body.classList.contains('night-mode')) {
    localStorage.setItem('dayNightToggler', 'enabled');
  } else {
    localStorage.setItem('dayNightToggler', 'disabled');
  }
});

if (localStorage.getItem('dayNightToggler') == 'enabled') {
  document.body.classList.toggle('night-mode');
  dayNightToggler.classList.add('toggled');  
}



// Dark Mode Ends

var searchDesktopContainer = document.getElementById("searchDesktopContainer");


function toggleDesktopSearch() {
  var searchDesktopOverlay = document.getElementById("searchDesktopOverlay");
  searchDesktopOverlay.classList.toggle("active");
  searchDesktopContainer.classList.toggle("active");
  var autofocusdesktop = document.getElementById("search-input");
  setTimeout(() => autofocusdesktop.focus(), 100);
}
// For Click outside
window.addEventListener('mouseup', function (event) {
  if (event.target != searchDesktopContainer && event.target.parentNode != searchDesktopContainer) {
    searchDesktopOverlay.classList.remove("active");
    searchDesktopContainer.classList.remove("active");
  }
});

// Click outside ends

// For Scroll Function
var mybutton = document.getElementById("myBtn");
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  scrollFunction()
};

function scrollFunction() {

  // For Navbar
  var currentScrollPos = window.pageYOffset;
  prevScrollpos = currentScrollPos;
  // Navbar Ends

  // for scroll indicator
  scrollIndicator()

  function scrollIndicator() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("scrollIndicator").style.width = scrolled + "%";
  }

  // Scroll to top
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "flex";
  } else {
    mybutton.style.display = "none";
  }
}

// Scroll To Top
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}