const todoTitle =document.querySelector('.todo-title')
const addTodoButton = document.querySelector('.add-todo')
const todoList = document.querySelector('.todo-list')

function removeTodo(event){
    event.target.parentNode.remove()
}

function addTodo() {
    // div
    const todo = document.createElement('div')
    todo.classList.add('todo')

    // h3
    const h3 = document.createElement('h3')
    h3.innerHTML = todoTitle.value

    // button
    const button = document.createElement('button')
    button.type = 'button'
    button.classList.add('remove-todo')
    button.innerHTML = 'ลบ'
    button.addEventListener('click',removeTodo)

    // h3 , button => div
    todo.append(h3,button)

    //  div => todo list
    todoList.prepend(todo)
}

addTodoButton.addEventListener('click',addTodo)