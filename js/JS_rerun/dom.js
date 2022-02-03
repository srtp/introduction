let a = document.getElementById('demo')
let b = document.getElementsByTagName('p')
let c = document.getElementById('demo2')
let d =  document.querySelector('.myjs') // อ้างผ่าน class และสามารถอ้างอิงได้หลากหลายเช่น id tag ส่วนใหญ่ใช้เรียก class
let e =  document.querySelectorAll('p') // สามารถเรียกได้ทั้งหมด
let f =  document.querySelectorAll('#demo3')

console.log(a)
console.log(b)
console.log(d)
console.log(e)
console.log(f)

// เปลี่ยนแปลงเนื้อหา
a.innerText ="Hello"
// สร้างตัวแปร
let x = 10;
let y = 20;

function displayText(){
    a.innerText ="<strong>Hello</strong>"
}

function displayText2(){
    a.innerHTML ="<strong>Hello</strong>"
}

function displayString(){
    a.innerHTML = "แสดงข้อมูลในตัวแปร = " + x + " และ " + y
    c.innerHTML = `แสดงข้อมูลตัวแปร x = ${x} และตัวแปร y = ${y}`
}