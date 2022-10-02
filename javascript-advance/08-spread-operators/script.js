// Spread Operators

// const mhs = [
//     'shandika',
//     'dody',
//     'rifal'
// ];

// result akan menjad istrings
// console.log(...mhs);
// // mesikpun singgle 
// console.log(...mhs[0]);


// kapan di pakainya?
// Menggabungkan 2 arrays
// const dosen = ['ade', 'hendra', 'wanda'];
// // (cara lama) menggabungkan menggunakan concat
// const orang = mhs.concat(dosen);
// //cara menggabungkan menggunkan itterables
// const orang2 = [...mhs, ...dosen];
// menggunkan itterables bisa menambahkan di array di tengah2 (aji akan menjadi index ke 3 bagian mhs
// const orang3 = [...mhs, 'aji' ,...dosen]
// // dipakai untuk melakukan copy pada array
// // ini copyannya beda dengan copyMhs = [mhs]
// const copyMhs = [...mhs];
// copyMhs[0]  = 'fajar';
// console.log(copyMhs);



// contoh impl dengan HTML
// const li = document.querySelectorAll('.list-name');

// console.log(li.textContent);

// const liMhs = [];

// for (let i = 0; i < li.length; i++) {

//     liMhs.push(li[i].textContent);

// }

// console.log(liMhs);

// ubah dulu menjadi array
// const liMhs = [...li].map(m => m.textContent);
// console.log(liMhs);


const nama = document.querySelector('.name');
const huruf = [...nama.textContent].map(h =>  `<span>${h}</span>`).join(' ');

nama.innerHTML = huruf;












