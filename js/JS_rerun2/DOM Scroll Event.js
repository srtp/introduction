let scrollInfo = document.querySelector('.scroll-info')
let lastScrollY = 0

window.addEventListener('scroll',() => {
    if (window.scrollY > lastScrollY){
        scrollInfo.classList.add('hide')
    }
    else {
        scrollInfo.classList.remove('hide')
    }
    lastScrollY = window.scrollY
})