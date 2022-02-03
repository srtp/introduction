let scores = [82,75,48,64,36]

// Map
let passFailScores= scores.map((score) => {
    if(score >= 50){ 
        return 'pass'
}
   return 'failed'
})

console.log(scores);
console.log(passFailScores);

// filter

let passFilter = scores.filter((score) =>{
    return score >= 50
})

console.log(passFilter);

// Reduce

let passReduce =scores.reduce((sum,score) =>{
    return sum+score
})

console.log(passReduce);