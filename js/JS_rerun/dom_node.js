//  เลือก Array
const textAll = document.querySelectorAll('p')
let message = textAll[1].innerHTML
console.log(message);

// การใช้ appendChild และ  Create Element
const menu = document.getElementById('menu')
let count = 1;

function addItem(){
    const item = document.createElement('li') // การ Create Element Li
    item.innerText = "Item"+(count++) // เพิ่มค่าทีละ 1 
    menu.appendChild(item)

    }


// การ Delete

const menu2 = document.getElementById('menu2')
const item2 = document.getElementById('item-3')
const item3 = document.getElementById('item-4')

function deleteItem(){
    menu2.removeChild(item2)
}

//การการที่

const newItem = document.createElement("li")
newItem.innerText = "x"

function replaceItem4(){
    menu2.replaceChild(newItem,item3)
}