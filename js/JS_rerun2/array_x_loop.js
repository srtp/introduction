let scroe = [82,75,48,64,36]

let passCount = 0

// for(let i=0; i <scroe.length; i++){
//     if (scroe[i] >= 50){
//         passCount++
//     }
// }

scroe.forEach((score0) =>{
    if (score0>=50){
        passCount++
    }
})

console.log(passCount);