//  Search String
const word = 'Black Earring'
const searchWord = 'Ear'
// const isFound = word.includes(searchWord)
const isFound = word.toLowerCase().includes(searchWord.toLowerCase())

console.log(isFound);


// Slice string
const productCode = 'th-926405'
const country = productCode.slice(0,2)
const productId= productCode.slice(3)

// console.log(productCode);
// console.log(country);
// console.log(productId);

// Template string
console.log(`Country = ${country}, ProductID = ${productId}`);