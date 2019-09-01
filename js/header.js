window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        document.getElementsByClassName("nav-head")[0].style.top = "-8%";
        document.getElementsByClassName("gotoTop")[0].style.display = "block";
    } else {
        document.getElementsByClassName("nav-head")[0].style.top = "0";
        document.getElementsByClassName("gotoTop")[0].style.display = "none";
    }
}