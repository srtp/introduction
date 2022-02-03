const todoInput = document.querySelector('.todo-input')
const addTodoBtn= document.querySelector('.add-todo')
const todoList = document.querySelector('.todo-list')
const getLike = document.querySelector('.like')



function removeTodo(event){
    event.target.parentNode.remove()
}

function checkList(event){
    event.target.parentNode.classList.toggle('text-line')
}

// function click (){
//     like += 1
//     document.querySelector('.like').innerHTML = `${like} LIKE`
// }

function addTodo(event){
    event.preventDefault()
    
    let like = 0


    // div
    const todo = document.createElement('div')
    todo.classList.add('todo')
    
    
    

    // h3
    const h3 = document.createElement('h3')
    h3.innerHTML = todoInput.value

    // button ADD
    const buttonAdd = document.createElement('button')
    buttonAdd.type ='button'
    buttonAdd.classList.add(`btn`)
    buttonAdd.classList.add(`btn-danger`)
    buttonAdd.classList.add(`buttonCSS`)
    buttonAdd.innerHTML = 'DELETE'
    buttonAdd.addEventListener('click',removeTodo)

    // Button check
    const buttonList = document.createElement('button')
    buttonList.type = 'button'
    buttonList.classList.add(`btn`)
    buttonList.classList.add(`btn-success`)
    buttonList.classList.add(`buttonCSS`)
    buttonList.innerHTML ='CHECK'
    buttonList.addEventListener('click',checkList)

    // button like
    let id = "id" + Math.random().toString(16).slice(2)
    const buttonLike = document.createElement('button')
    buttonLike.type = 'button'
    buttonLike.classList.add(`btn`)
    buttonLike.classList.add(`btn-light`)
    buttonLike.classList.add(`buttonCSS`)
    buttonLike.classList.add(`like`)
    buttonLike.setAttribute('id',id)
    buttonLike.innerHTML =`${like} LIKE`
    buttonLike.addEventListener('click', ()=>{
        
        like += 1
        document.getElementById(id).innerHTML = `${like} LIKE`
        
    })

    // h3 , button => div
    todo.append(h3,buttonLike,buttonAdd,buttonList)

    //  div => todo list
    todoList.prepend(todo)

    
    todoInput.value = " "

    
    
}

const keyup = (event) => {
    if (event.key ==='Enter'){
        addTodo(event);
    console.log(event.key);

}
}

document.addEventListener('keyup',keyup)


addTodoBtn.addEventListener('click',addTodo)
