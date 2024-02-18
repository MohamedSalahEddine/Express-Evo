const mySidenav = document.querySelector("#mySidenav");
const mySidenav_right = document.querySelector("#mySidenav_right");



function openNav() {
    if(mySidenav) mySidenav.style.width = "250px";
    closeNavRight();
}


function closeNav() {
    if(mySidenav) mySidenav.style.width = "0";
}
function openNavRight() {
    if(side_cart) side_cart.style.padding = "0";
    if(side_cart) side_cart.style.width = "0";
    if(mySidenav_right) mySidenav_right.style.width = "300px";
    closeNav();
}

function closeNavRight() {
    if(mySidenav_right) mySidenav_right.style.width = "0";
}

