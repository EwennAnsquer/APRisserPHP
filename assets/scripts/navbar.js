const navbar = document.querySelector(".navbar")

function moveNavBar(num) {
    navbar.style.transform = "translateY(" + num + "px)";
}

var lastScrollTop = 0;

window.addEventListener("wheel",()=>{
    var st = window.pageYOffset || document.documentElement.scrollTop;
    if (st > lastScrollTop) {
        moveNavBar(-200)
    } else {
        moveNavBar(0)
    }
    lastScrollTop = st;
});