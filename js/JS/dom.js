const titleEl = document.getElementById('title')
const contentEl = document.querySelector('.content')
const allEl = document.querySelectorAll('p')

const box = document.querySelector('.light')

// titleEl.style.color = "red"
// titleEl.style.background = "black"

// function displayText(){
//     // titleEl.style.color = "red"
//     // titleEl.style.background = "black"
//     // titleEl.style.fontSize = "60px"
//     // contentEl.setAttribute('class','Petch') // สามารถเรียน css มาใช้ได้ Ex .petch {บลาๆ}
//     box.setAttribute('class','dark')
// }

function lightmode(){
    box.setAttribute('class','light')
}

function darkmode(){
    box.setAttribute('class','dark')
}