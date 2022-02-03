let name = 'ศักดา'

let rabbit = {
    name: 'น้องหยก',
    breed: 'พันธ์ดุ',
    color: 'ขาว',
    weight:54 ,
    talk(){
        console.log(this.name+' ' + 'Oung oung');
    },
    weightDetail(){
        if (this.weight < 50){
            return 'น้อยเกิ้นไป๊'
        }
        else if (this.weight > 50){
            return 'อ้วนหว่ะ'
        }

        return 'ปกติ'

        
    }

}

rabbit.talk();
console.log(rabbit.weightDetail());

