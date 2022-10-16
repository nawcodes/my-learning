// debugger harus paham dengan break point
function sayHello(name) {
    debugger; //break point
    return `Hello ${name}`;
}

const name = "John";
const result = sayHello(name);
console.log(result);

// Run: node inspect debugger.mjs
// debug> n //next
// debug> c //continue
// debug> repl //untuk melihat isi variable
// debug> watch('name') //untuk melihat perubahan variable
// debug> unwatch('name') //untuk menghapus watch
// debug> watchers //untuk melihat semua watch
// debug> set
// debug> set name = 'Jane'
// recomended: with RUN AND DEBUG (F5)