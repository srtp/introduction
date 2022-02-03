function test(...aa){
    console.log(aa)
}
function test2(a, b, ...aa){
    console.log(aa)
}
test(1, 2, 3, 4)  // [1, 2, 3, 4]
test2(1, 2, 3, 4)  // [3, 4]