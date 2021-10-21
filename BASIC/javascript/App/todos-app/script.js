const form = document.getElementById('form');
const input = document.getElementById('input');
const todos = document.getElementById('todos');

form.addEventListener('submit', (e) => {
    // have not ever reload
    e.preventDefault();

    const todoText = input.value;

    if(todoText) {
        const todoEl = document.createElement('li');
        todoEl.innerText = todoText;
        todos.appendChild(todoEl)

        todoEl.addEventListener('click', () => {
            todoEl.classList.toggle('completed');
        });


        // when right click is clicked | remove!
        todoEl.addEventListener('contextmenu', () => {
            e.preventDefault();
            todoEl.remove();
        })

        // empty the value input after added
        input.value = '';
    }
})