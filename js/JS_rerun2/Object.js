let rabbit = {
    name: 'น้องหยก',
    breed: 'พันธ์ดุ',
    color: 'ขาว',
    weight:48 

}

console.log(rabbit);

console.log('ชื่อกระต่าย = ',rabbit.name);
let rabbits =[{
    name: 'น้องหยก',
    breed: 'พันธ์ดุ',
    color: 'ขาว',
    weight:48 

},
{
    name: 'น้องเพชร',
    breed: 'พันธ์ดุ',
    color: 'ดำ',
    weight:60 

}
]

rabbits.forEach((rabbit) =>{
    console.log(rabbit.name + ' , ' + rabbit.breed);
})

