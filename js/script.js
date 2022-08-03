navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');

}

document.querySelectorAll('input[type="num"]').forEach(input =>{
    input.oninput = () =>{
        if (input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);

    }
})

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



function fadeOut(){
    setInterval(loader, 1000);
}

window.onload = fadeOut();