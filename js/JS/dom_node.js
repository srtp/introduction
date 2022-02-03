// const textAll = document.querySelectorAll('p')
// console.log(textAll[0]);
// let test= textAll[1].innerHTML;
// console.log(test)

//============= ++++======================
// const menu =document.getElementById('menu')
// let count = 1 ;


// function addItem(){
//     const item = document.createElement('li')
//     item.innerText = "สวัสดี"+(count++)
//     menu.appendChild(item);

// }

const menu = document.getElementById('menu')
const item =  document.getElementById('item-3')
const item2 =  document.getElementById('item-2')


const newItem = document.createElement('li')
newItem.innerText = "X"

// ลบ
function remove_data(){
   
menu.removeChild(item)
}
// แทนที่
function pase_data(){
    menu.replaceChild(newItem,item2)
}