// 1. getElementById

const judul = document.getElementById('judul');
console.log(judul);
judul.style.color = 'green'; 
judul.innerHTML = 'Hello Rifal';

// 2. getElementsByTagName
const p = document.getElementsByTagName('p');
console.log(p); // return array html collection
for (let i = 0; i < p.length; i++) {
    const element = p[i];
    element.style.backgroundColor = 'lightblue';
}
const h1 = document.getElementsByTagName('h1')[0];
console.log(h1);


// 3. getElementByClassName
const p1 = document.getElementsByClassName('p1');
console.log(p1); // return htmlCollection an array

    