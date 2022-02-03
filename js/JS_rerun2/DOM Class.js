let body = document.body
let themeBtn = document.querySelector('.theme-btn')

themeBtn.addEventListener('click',() => {
    // Change Theme
    body.classList.toggle('dark-theme')
})