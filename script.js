document.getElementById("impressum_link").onclick = function () {
    document.getElementById("startseite").hidden = true;
    document.getElementById("profil").hidden = true;
    document.getElementById("impressum").hidden = false;
}

document.getElementById("nav_profil").onclick = function () {
    document.getElementById("startseite").hidden = true;
    document.getElementById("profil").hidden = false;
    document.getElementById("impressum").hidden = true;
    document.getElementById("nav_profil").classList.add("active");
    document.getElementById("nav_home").classList.remove("active");
}

document.getElementById("nav_home").onclick = function () {
    document.getElementById("startseite").hidden = false;
    document.getElementById("profil").hidden = true;
    document.getElementById("impressum").hidden = true;
    document.getElementById("nav_home").classList.add("active");
    document.getElementById("nav_profil").classList.remove("active");
}

document.getElementById("logo").onclick = function () {
    document.getElementById("startseite").hidden = false;
    document.getElementById("profil").hidden = true;
    document.getElementById("impressum").hidden = true;
    document.getElementById("nav_home").classList.add("active");
    document.getElementById("nav_profil").classList.remove("active");
}

document.getElementById("login_btn").onclick = function () {
    document.getElementById("login").hidden = true;
    document.getElementById("nav").hidden = false;
    document.getElementById("startseite").hidden = false;
    document.getElementById("footer").hidden = false;
    document.getElementById("nav_home").classList.add("active");
}