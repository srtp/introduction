// Default_parameter

const addUser=(name,last,city="กทม")=>{
    return name + last + "city = "+city
}

console.log(addUser("เพชร","หยก","ชลบุรี"))
console.log(addUser("โจ้โจ้","ทองคำ"));