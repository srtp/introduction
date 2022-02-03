function welcome(){
    alert("ยินดีต้อนรับ")
}

// on focus
function hightlight(obj){
    obj.style.background="yellow"

}
// on blur
function unhightlight(obj){
    obj.style.background="red"

}

// 

function getMenu(){
    const menu = document.getElementById('menu')
    const display = document.getElementById('display')
    console.log(menu.value.toUpperCase());
    display.innerText = menu.value
}
