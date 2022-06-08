let profile = document.querySelector('.header .flex .profile');
let toggle = document.querySelector("#user-btn");

    toggle.onclick = () => {
        profile.classList.toggle('active');
        navbar.classList.remove("active");
    }
// document.querySelector('#user-btn').onclick = () => {
//     profile.classList.toggle('active');
// }

let navbar = document.querySelector('.header .flex .navbar');
let toggleNav = document.querySelector("#menu-btn");

    toggleNav.onclick = () => {
        navbar.classList.toggle('active');
        profile.classList.remove("active");
    }
// document.querySelector('#menu-btn').onclick = () => {
//     navbar.classList.toggle('active');
// }

window.onscroll = () => {
    profile.classList.remove("active");
    navbar.classList.remove("active");
}