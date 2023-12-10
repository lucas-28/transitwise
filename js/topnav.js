// Written by ChatGTP
// Topnav
const navToggle = document.querySelector('.nav-toggle');
const navList = document.querySelector('.responsive-nav-list');
const navScreen = document.querySelector('.responsive');

navToggle.addEventListener('click', () => {
    navList.classList.toggle('active');
    navScreen.classList.toggle('active');
});
// End Topnav