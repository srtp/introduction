let numberInput = document.getElementById('number-input')
let runButton = document.getElementById('btn')
let output = document.getElementById('output')

function printMutiply(){
    let number = Number(numberInput.value) 
    let outputHtml =''

    if(number === 0){
        output.innerHTML = '<h1>อยากบอกว่าเสียใจ</h1>'
        return
    }

    for (let i = 1; i<=12; i++){
        outputHtml +='<p>'
        outputHtml += number + 'x' + i + '=' + (number*i)
        outputHtml += '</p>'
    }

    output.innerHTML = outputHtml


}

runButton.addEventListener('click', printMutiply)