// Computed Property Name

let food1={name:"cake",price:"200"}
let food2={'name':"cake red" , "price":250}

let user={
    ['user'+1]:"petch",
    ['user'+2]:"aaaaaa"

}

console.log(food1);
console.log(food2);
console.log(user);


// ex2
let name = "fruit"
let food ={
    [name]:name+ "มะม่วง",price:"250"
}

console.log(food);

//  ex 3 

let kanom="cake"
let menu={
    [kanom]:kanom+" ส้ม" , [kanom+"Mix"]:" ผลส้ม"
}

console.log(menu);

let {cake,cakeMix}=menu // สังเกตดีๆ property เหมือนกัน cake , cakeMix
console.log(cake);
console.log(cakeMix);