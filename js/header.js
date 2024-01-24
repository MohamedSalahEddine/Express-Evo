
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    closeNavRight();
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
function openNavRight() {
    document.getElementById("mySidenav_right").style.width = "300px";
    closeNav();
}

function closeNavRight() {
    document.getElementById("mySidenav_right").style.width = "0";
}

