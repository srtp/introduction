const todoInput = document.querySelector('.todo-input')
const addTodoBtn= document.querySelector('.add-todo')
const todoList = document.querySelector('.todo-list')

function removeTodo(event){
    event.target.parentNode.remove()
}

function checkList(event){
    event.target.parentNode.classList.toggle('text-line')
}

function addTodo(event){
    event.preventDefault()


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
    buttonAdd.innerHTML = 'DELETE'
    buttonAdd.addEventListener('click',removeTodo)

    const buttonList = document.createElement('button')
    buttonList.type = 'button'
    buttonList.classList.add(`btn`)
    buttonList.classList.add(`btn-success`)
    buttonList.innerHTML ='CHECK'
    buttonList.addEventListener('click',checkList)

    // h3 , button => div
    todo.append(h3,buttonAdd,buttonList)

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
