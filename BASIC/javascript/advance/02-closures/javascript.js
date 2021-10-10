

// var nama = 'rifal nurjamil';
// console.log(nama);


// 1. creation phase 
// cara kerja pertama,  javascirpt akan mencari variable dan function terlebih dahulu sebelum perintah yang lain (ex:console.log) , 
// kalo ada variable , var akan di isi dengan = undifined
// kalo ada funciton , function tersebut akan di isi dengan function itu sendiri = fn()
// konsep di atas di namakan HOISTING

// jadi pertama js akan membuat this sebagai global object dan windows sebagai this

// baru execution phase : 
    // mengeksekusi baris perbaris dari atas kebawah.
    // contoh jika yang pertama : 
    //  console.log(nama) akan di isi undefined
    // lalu var = 'rifal' ; hasil ini hanya akan tersimpan di memori 
    // jadi console.log(nama) merturn undifined terlebih dahulu.
    // dan sebaliknya.


// contoh lain  
// creation phase terlebih dahulu 
// lalu mencari kedua variable dan function

// console.log(sayHello()); return tapi var undifined

// var nama = 'rifal';
// var umur = '21';

// console.log(sayHello()); return kedua variable

    // function membuat excution contenxt seolah olah dalam visualnya panahnya masuk ke dalam.
    // yang di dalamnya terdapat creation dan execution phase
    // accesss local EC bisa akses windows dan arguments [param]
    // di dalamnya ada hoisiting juga (local) atau di dalam function ada function lagi gak ? dia juga pasti melakukan hositing
    // kalo ada variable isi dulu dengan undifined pada phase creation 

// function sayHello() {
//  console.log(`hallo nama saya ${nama}, umur saya ${umur} tahun.`);
//  jika return menghasilkan undifined setelah hoisting benar
// karena sebuah function harus mengembalikan nilai = return;
// }


// contoh lain

// var nama = 'rifal';
// var username   = '@nawi'

// function cetakUrl(username) {
//     var instagramUrl = 'http://instagram.com/';

//     return instagramUrl + username;
    
// }

// console.log(cetakUrl(username));

// alur kerja 
// 1 jalanin global a(); buat object a();
// 2 masuk ke dalam a , console.log('ini a'); sambil hoisting b,
// 3 cetak ini a , dan jalanin b(); buat object b();
// 4 masuk kedalam b , console.log('ini b'); sambil hoisting c();
// cetak ini b, dan jalainin c(); buat object c();
// check apakah ada variable dan function di dalam c? jika tidak maka isi dengan undifined
// cetak ini c , lalu ahkir dari c
// lalu akhri dari b
// tumpukan eksekusi hilang dan kembali ke a();


// function a() {
//     console.log('ini a');

//     function b() {
//         console.log('ini b');

//         function c() {
//             console.log('ini c');
//         }

//         c();
        
//     }
//     b();
// }

// a();
