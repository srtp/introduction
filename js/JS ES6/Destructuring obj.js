// Destructuring Object

// แบบเดิม
// var person = {
//     name:"Petch",
//     skill:"js php react golang"
// }

// var name = person.name
// var skill = person.skill
// console.log(`name = ${name} , Skill = ${skill}`);


// แบบใหม่

var  player = {
    name:"Petch",
    skill : "php python java"
}

let {name,skill} = player

console.log(`name = ${name} , Skill = ${skill}`);