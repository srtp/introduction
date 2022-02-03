const titleEl = document.getElementById('title') // id
const contentEl = document.querySelector('.content') // class
const allEl = document.querySelectorAll('p') // tag
const bodyBox = document.querySelector('.light')




function displayText(){
    titleEl.style.color ="red" // เปลี่ยนสี
    titleEl.style.background = "pink" // bg
    titleEl.style.fontSize ="28px" // font

    contentEl.setAttribute('class','petch') // เปลี่ยนชื่อคลาส
}

function displayMode(){
bodyBox.setAttribute('class','dark')
}

function displayMode2(){
    bodyBox.setAttribute('class','light')
    }