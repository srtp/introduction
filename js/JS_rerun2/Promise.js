function inputPromise(){
    return new Promise ((resolve,reject) => {
        setTimeout(() => {
            const numberInput = Number(prompt('ความกว้าง'))
            if (isNaN(numberInput)){
                reject(new Error('ไม่ได้กินผมหรอก'))
            }
            resolve(numberInput)
        }, 1000);
    })
}

inputPromise()
.then((result) => {
    alert(result);
})
.catch((error) => {
    alert(error.message)
})