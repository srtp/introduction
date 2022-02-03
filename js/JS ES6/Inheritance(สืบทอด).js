// แบบใหม่
class admin{
    constructor(){
        console.log("Call constructor");
    }
    isPermission(){
        console.log("Read Write Data From Database");
    }
}


class person extends admin{
    constructor(name,age){
        super() // เรียกใช้ class แม่
        this.name = name
        this.age = age
    }
    Saytest(){
        console.log("Hello "+ this.name + " Age"+ this.age);
    }
}

let person1 = new person("Settapak",21)
person1.Saytest()
person1.isPermission() // สามารถเรียก method จาก class แม่ได้