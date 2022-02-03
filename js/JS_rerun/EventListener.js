//อ้างอิง
const menu = document.getElementById('menu')
const display = document.getElementById('display')
const btn = document.getElementById('btn')
// event 

menu.addEventListener('change' , getMenu)
btn.addEventListener('click',showWelcome)

function getMenu(){
    display.innerText = menu.value
    console.log(menu.value);
}

function showWelcome(){
    alert("Hello World SRTP")
}

