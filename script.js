
// Select DOM elements for theme and navigation
let darkModeIcon = document.querySelector('#darkMode-icon');
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

/* --- Dark/Light Mode Logic --- */
darkModeIcon.onclick = () => {
    // Toggle the 'light-mode' class on the body element
    document.body.classList.toggle('light-mode');
    
    // Switch the icon appearance between moon and sun
    if (darkModeIcon.classList.contains('bx-moon')) {
        darkModeIcon.classList.replace('bx-moon', 'bx-sun');
    } else {
        darkModeIcon.classList.replace('bx-sun', 'bx-moon');
    }

    // Persist user preference using LocalStorage
    const isLightMode = document.body.classList.contains('light-mode');
    localStorage.setItem('theme', isLightMode ? 'light' : 'dark');
};

/* --- Mobile Menu Logic --- */
menuIcon.onclick = () => {
    // Toggle the menu icon to an 'X' shape
    menuIcon.classList.toggle('bx-x');
    // Slide the navbar in/out
    navbar.classList.toggle('active');
};

/* --- Scroll Events --- */
window.onscroll = () => {
    // Remove 'active' state from navbar when user scrolls
    menuIcon.classList.remove('bx-x');
    navbar.classList.remove('active');

    // Sticky Header: add background when scrolled more than 100px
    let header = document.querySelector('.header');
    header.classList.toggle('sticky', window.scrollY > 100);
};

/* --- Initialize Theme on Page Load --- */
window.onload = () => {
    // Check for saved theme in LocalStorage to maintain persistence
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'light') {
        document.body.classList.add('light-mode');
        darkModeIcon.classList.replace('bx-moon', 'bx-sun');
    }
};