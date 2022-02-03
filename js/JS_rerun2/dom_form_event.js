let answers = document.querySelectorAll('.ans')
let errorMessage = document.querySelector('.error-message')
let ansForm = document.querySelector('.ans-form')

let checkAns = (event) => {
    let tooLong = false 
    answers.forEach((ans) => {
        if (ans.value.length > 20) {
            tooLong = true
        }
    })
    if (tooLong){
        errorMessage.style.display = 'block'
        event.preventDefault()
    }
    

}

ansForm.addEventListener('submit',checkAns)

