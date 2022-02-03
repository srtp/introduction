const registerForm = document.querySelector('.register-form')
const emailInput = document.querySelector('#email-input')
const passwordInput = document.querySelector('#password-input')



function registerSubmit(event) {
    event.preventDefault();
    const user = {
        email:emailInput.value ,
        password:passwordInput.value,

    }

    fetch('https://reqres.in/api/register',{
        method:'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
          },
          body: JSON.stringify(user)
    })

    .then((response) => {
    return response.json()
    })

    .then((json) => {
        alert('สมัครสมาชิก id =' +json.id +' Success')

    })

    .catch((error) =>{
    console.log(error.message);
    })
}

registerForm.addEventListener('submit',registerSubmit) 