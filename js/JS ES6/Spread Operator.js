// Spread Operator

// Array
let fruit = ['มะม่วง','แตงโม']
console.log(fruit);
let newfruit=[...fruit,"ทุเรียน","มังคุด"]
// console.log(newfruit);

let food=["ข้าวผัด","ต้มยำ"]

let allfood = [...food,...fruit]
console.log(allfood);

// Ex2

let product={name:"ทุเรียน",price:200}
let newproduct = {...product,category:"ผลไม้"}
console.log(newproduct);

let newprice={...newproduct,price:500}
console.log(newprice);