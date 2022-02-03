const spoilBtn = document.querySelectorAll('.spoil-button')


function spoilClick(event){
    const messageId = event.target.dataset.messageId;
    const message = document.querySelector('#' + messageId)
    message.classList.toggle('show')
}

spoilBtn.forEach((button)=>{
    button.addEventListener('click',spoilClick)
})

// const birdImg =document.querySelector('.bird-img')
// const jsLink = document.querySelector('.js-link')
// const textInput = document.querySelector('.text-input')



// Classic

// console.log(textInput.getAttribute('hidden-message'));
// textInput.setAttribute('hidden-message','น่าเกลียด')


// Modern
// console.log(textInput.dataset.hiddenMessage);
// textInput.dataset.hiddenMessage = 'น่าเกลียด'


