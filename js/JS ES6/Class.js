

// แบบใหม่

class person{
    constructor(name,age){
        this.name = name
        this.age = age
    }
    Saytest(){
        console.log("Hello "+ this.name + " Age"+ this.age);
    }
}

let person1 = new person("Settapak",21)
person1.Saytest()


// แบบเดิม
// var user={
//     name:"Settapak",
//     age:30,
//     SayHi:function(){
//         return "Hello = " + this.name
//     }
// }

// console.log(user.SayHi());
// //  Ex2
// function member(name,age){
//     this.name=name
//     this.age=age
// }

// member.prototype.SayHello=function(){
//     console.log("Hello"+this.name + "Age"+this.age);
// }

// var member1=new member("Settapak",21);

// member1.SayHello()