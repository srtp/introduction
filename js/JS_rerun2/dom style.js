let message = document.querySelector('.message')
let spoilBtn = document.querySelector('.spoil-btn')
message.style.color = 'red'
message.style.backgroundColor = 'black'
message.style.fontSize = '20px'

spoilBtn.addEventListener('click', ()=>{
    // Show/Hide message
    if(message.style.display === 'none'){
        message.style.display = 'block'
    }
    else {
        message.style.display = 'none'
    }

})