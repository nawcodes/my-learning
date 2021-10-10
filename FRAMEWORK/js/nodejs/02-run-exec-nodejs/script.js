console.log('Hello World');
//---------------
const printName = (name) => `Hello myname is ${name}`;
function anotherName (name) {
    return `Hallo ${name}`;
}
console.log(printName('rifal'));
//---------------
// console.log(window);
// effectnya bisa di pakai di script lain
// console.log(window.anotherName('sari'));
// end effectnya bisa di pakai di script lain
// console.log(window.printName('sarah'));

// open your terminal
// node script / node script.js
// execute lebih dari 1 file js di node js // pake require() saling menghubungkan , jangan lupa kasih variable
// execute fn di file js lain pake module.exports('fn name');
module.exports = anotherName;




