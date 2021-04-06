// decalare function


// Kerjakan tugas merupakan HIGH ORDER FUNCTION yang menyimpan function selesai 
// sedangkan selesai bisa di sebut callback function
// function kerjakanTugas(matkul, selesai) {
//     console.log(`Mulai Kerjakan tugas, ${matkul}`);
//     selesai();
// }

// function selesai() {
//     alert('Selesai Mengerjakan Tugas!');
// }


// kerjakanTugas('mtk', selesai);


// contoh lain
// setInterval adalah HIGH ORDER FUNCTION
// paramater 1 adalah function di dalamnya merupakan callback
// setInterval(function () {
//     console.log(`Hello Word`);
// }, 500);



// contoh lain

// let btn = document.querySelector('.btn');

// HIGH ORDER FUNCTIOn
// btn.addEventListener('click', function () {
//     console.log('Tombol di clikc');
// });


// contoh lain

// higorder fn
// function ucapkanSalam(waktu) {
//     // karena
//     // callback return value function 
//     return function (nama) {
//         return `Hallo nama saya adalah ${nama}, dan selamat ${waktu}`;
//     }
// }


// let say = ucapkanSalam('malam');

// console.log(say('rifal'));


// contoh HIGHORDER FN BAWAAN

const angka = [-1, 9 , 7, 10, 11, 14, -4, -7 , -8 ,2 ,0];

// menggunakan for adalah manual 
// mencari angka lebih besar dari 3
// const fillAngka = [];

// for (let i = 0; i < angka.length; i++) {
//     if(angka[i] >= 3) {
//         fillAngka.push(angka[i])
//     }
// }

// console.log(fillAngka);


// menggunakan filter
// urutkan
// const newAngka = angka.filter(function (a) {
//     return a > 3;
// });

// arrow fn
// const newAngka = angka.filter( (a) => a >= 3); 

// map 
// kalikan semua angka dengan dua

// const newAngka = angka.map((a) => a*2);


// reduce
// melakukan sesautu pada seleuruh arraynya.
// jumlah seleuruh element pada array
// process accumulator 
// 0 + -1+ 9 + 7+ 10+ 11+ 14+ -4+ -7 + -8 +2 +0
// awal nilai bisa diganti dengan menambahkan number pada param , 10
// const newAngka = angka.reduce((accumulator, curentValue)  => {
// return accumulator + curentValue;
// });

// console.log(newAngka);


// method chain
// cari angka yang lebih dari 5
// setelah itu kalika 3
// setelah jumlahkah 

// const hasil = angka.filter( a => a >= 5) //9 , 7 , 10, 11, 14
//                     .map(a => a * 3)
//                     .reduce((acc, cur) => acc + cur, 0);

// console.log(hasil);


