navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');

}

profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');

}
window.onscroll = () =>{
    navbar.classList.remove('active');
    profile.classList.remove('active');
}
function loader(){
    document.querySelector('.loader').style.display = 'none';
}

// notice 1000 = 1 seconds
// so 2000 = 2 seconds

function fadeOut(){
    setInterval(loader, 1000);
}

window.onload = fadeOut();