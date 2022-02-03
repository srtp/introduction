let scores = [82,75,48,64,36]

// find
let failScore = scores.find((score)=>{
    return score < 50 
})

console.log('find = ',failScore);

// findIndex
let failScoreIndex = scores.findIndex((score)=>{
    return  score <50
})

console.log('findIndex = ',failScoreIndex);


// every

let checkScore = scores.every((score)=>{
    return score > 50
})

console.log('Result for every = ',checkScore);

// some

let someScore = scores.some((score)=>{
    return score > 50
})

console.log('Result for some = ',someScore);

