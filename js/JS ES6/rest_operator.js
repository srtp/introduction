// Rest Operator คือ จุด3จุด ...

const addUser=(name,last,...city) =>{
    return name + " " + last + " " + city
}

console.log(addUser("เพชร","หยก","ชลบุรี"));
console.log(addUser("เพชร","หยก","ชลบุรี","กทม"));

// ex2 การเรียก array มาทั้งก้อน

const addMessage=(first,went,...message)=>{
    return message.map(m=>first+message+went) // เช่น ต้องการเรียก first ต่อ  message ต่อ went โดยใช้ fn map
} 

console.log(addMessage("Hello","JS","React","Bye")) // ผลลัพธ์จะได้  HelloReact ,ByeJS

// Ex3

const addNumber=(...number)=>{
    return number.reduce((first,current)=>{
        return first + current
    })
}

console.log(addNumber(1,2,3,4,5));