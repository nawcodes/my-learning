function init() {
    // let nama = 'rifal';
    // let umur = 10;

    // function tampilNama() { // inner function (closures)
    //     // jika var local nama tidak ada maka dia akan mencari keluar , ke parent dan sampai ke global sampai variable nya di temukan 
    //     // tapi jika var local ada di tampilNama maka function tampilNama bukan lagi di sebut closures
    //     console.log(nama);
         
    // }

    // contoh lain function dengan parameter
    // variable harus di hapus
    // mengirim arguments pada init yang sudah di deklarasikan di variable dan menjalankannya.
    // panggilNama('rifal');
    // function tampilNama(nama) { // inner function (closures)
    //     // jika var local nama tidak ada maka dia akan mencari keluar , ke parent dan sampai ke global sampai variable nya di temukan 
    //     // tapi jika var local ada di tampilNama maka function tampilNama bukan lagi di sebut closures
    //     console.log(nama);
         
    // }

    // contoh lain anonymoud function 
    // variable harus di hapus
    // mengirim arguments pada init yang sudah di deklarasikan di variable dan menjalankannya.
    // panggilNama('rifal');
    // langsung return pada functionnya.
    return function tampilNama(nama) { // inner function (closures)
        // jika var local nama tidak ada maka dia akan mencari keluar , ke parent dan sampai ke global sampai variable nya di temukan 
        // tapi jika var local ada di tampilNama maka function tampilNama bukan lagi di sebut closures
        console.log(nama);
         
    }

    // console.log(tampilNama);
    // console.dir(tampilNama);
    //return tampilNama; //ketika function di return tanpa menjalankannya maka yang terjadi adalah, function init di jalankan sebagian (tanpa function tamplNama) jika hal ini terjadi maka init() harus di simpan ke variable , dan jalankan variable tersebut layaknya function.

    

}

let panggilNama = init(); 
panggilNama('yeee');







// priavate method

// function ucapkanSalam(waktu) {
//     return function(nama) {
//         console.table(`Hallp ${nama}, Selamat ${waktu}, semoga hari mu menyenagkan.`);
        
//     }
// }

// // arguments ini buat untuk ucapkanSalam();
// let selamatPagi = ucapkanSalam('Pagi');
// let selamatSiang = ucapkanSalam('Siang');
// let selamatMalam = ucapkanSalam('Malam');

// // arguments ini untuk inner function yang di dalamnya.
// selamatPagi('rifal');
// selamatSiang('shandika');
// selamatMalam('galih');

// console.dir(selamatMalam);


// contoh clasic
// terlihat baik baik saja pada var counter
// tapi masalahnya, misalnya ketika kalian mengisi ulang si var counternya jadi 10 
// agar var counter tidak terganggu = bisa saja counternya di masukan ke dalam function add : cuman masalahnya returnnya pasti 1 semua;
// solusinya pakai clousure / inner function


// let counter = 0;


// let add = function() {
//     let counter = 0;
//     return function() { 
//        return ++counter;
//     }
// }





// console.log(add());
// console.log(add());
// console.log(add());
// console.log(add());

// solusi: 
// jadi ketika variable click di buat , 
// variable click untuk menjalankan function yang di dalamnya (anonymous fn)
// sedangkan add untuk menjalankan function add saja.
// let click = add();
// console.log(click());
// console.log(click());
// console.log(click());
// console.log(click());


// atau function closures bisa juga di jalankan tanpa membuat varibale terlebih dahulu
// caranya kasih buka kurung sebelum function dan bungkus akhirnya. lalu tambahkan kurung buka kurung tutup lagi.

let add = (function() {
    let counter = 0;
    return function() { 
       return ++counter;
    }
})();

let counter = 100;

console.log(add());
console.log(add());

console.log(add());

console.log(add());

console.log(add());






