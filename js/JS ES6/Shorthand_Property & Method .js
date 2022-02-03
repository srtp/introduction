//  แบบเดิม

let name = "petch"
let last = "settapak"
let age = "21"

let user ={
    name:name,
    last:last
}

// console.log(user);

// แบบใหม่

let user2={
    name,last
}

// console.log(user2);

// Ex2

function user3(name2,last2,age2){
    return{
        name2,last2,age2
    }
}

console.log(user3("Petch","Settapak",21));