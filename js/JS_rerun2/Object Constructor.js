function Rabbit(name,breed,color,weight){
    this.name = name
    this.breed= breed
    this.color = color
    this.weight = weight
    this.talk = function (){
        console.log(this.name + ' Oung Oung');
    }
}

let rabbit1 = new Rabbit('น้องหยก','ดุ','ขาว',40)
let rabbit2 = new Rabbit('น้องเพชร','ดุ','ดำ',50,)

rabbit1.talk()
rabbit2.talk()


