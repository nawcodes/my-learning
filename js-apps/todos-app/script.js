const form = document.getElementById('form');
const input = document.getElementById('input');
const todosUL = document.getElementById('todos');

const todos = JSON.parse(localStorage.getItem('todos'));

if(todos) {
    todos.forEach(todo => {
        addTodo(todo);
    })
}

form.addEventListener('submit', (e) => {
    // have not ever reload
    e.preventDefault();
    addTodo('');
});

function addTodo(todo) {
   let todoText = input.value;

   if(todo) {
     todoText = todo.text;
   }



    if(todoText) {
        const todoEl = document.createElement('li');
        if(todo.completed) {
            todoEl.classList.add('completed');
        } 

        todoEl.innerText = todoText;
        todosUL.appendChild(todoEl)
        
        todoEl.addEventListener('click', () => {
            todoEl.classList.toggle('completed');
            updateLS();
        });


        // when right click is clicked | remove!
        todoEl.addEventListener('contextmenu', (e) => {
            e.preventDefault();
            todoEl.remove();
            updateLS();
        })

        // empty the value input after added
        input.value = '';

        updateLS();
    }
}

function updateLS() {
    const todosEl = document.querySelectorAll('li');
    const todos = [];

    todosEl.forEach(todoEl => {
        console.log(todoEl);
        todos.push({
            text: todoEl.innerText,
            completed: todoEl.classList.contains('completed')
        });
    });

    localStorage.setItem('todos', JSON.stringify(todos));
}
