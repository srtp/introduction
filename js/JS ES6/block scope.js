// global , local -> block scope

let price=20
let fruit="มะม่วง"

// Define

// inblock
if(price ===20){
    // update
    let fruit="ส้มโอ"
    console.log("in block",fruit);
}
// out block
console.log("out block",fruit);

// const เปลี่ยนค่าไม่ได้ แต่จะเปลี่ยนค่าที่เป็น obj ได้
const person={name:"petch",last:"thongyou"}
person.name="settapak"

console.log(person);