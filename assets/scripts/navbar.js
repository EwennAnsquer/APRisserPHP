const navbar = document.querySelector(".navbar")
const navLink = [...document.querySelectorAll(".categorieNav a")]
const categorieTitle = [...document.querySelectorAll(".categorie h2")]

function moveNavBar(num) {
    navbar.style.transform = "translateY(" + num + "px)";
}

function getScrollValue(){
    scroll = document.documentElement.scrollTop
    totalheight = document.documentElement.scrollHeight; //hauteur total du document
    clientHeight = document.documentElement.clientHeight;// hauteur total de la 'fenetre' du client
    scrollPercentage = Math.round(scroll * 100 / (totalheight - clientHeight))
    return scrollPercentage
}

function navbarStyle(){
    let scrollValue=getScrollValue();
    if(scrollValue>5){
        navbar.style.boxShadow="0px 15px 20px 0px rgb(0 0 0 / 10%)";
    }else{
        navbar.style.boxShadow="none";
    }
}

var lastScrollTop = 0;

navbarStyle()

window.addEventListener("wheel",()=>{
    var st = window.pageYOffset || document.documentElement.scrollTop;
    if (st > lastScrollTop) {
        moveNavBar(-200)
    } else {
        moveNavBar(0)
    }
    lastScrollTop = st;
    navbarStyle()
});

navLink.forEach(e => {
    e.addEventListener("click",()=>{
        window.scrollTo(0,categorieTitle[navLink.indexOf(e)].getBoundingClientRect().top + window.scrollY - 120) 
    })
});

//va scroller verticalement avec le resultat du nombre de pixel de distance avec le haut de la vue du client + le nombre de pixel scroll sur la page - 120 pour ne pas avoir la navbar qui cache tout