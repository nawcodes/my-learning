// const Mahasiswa = function() {
//      this.nama = 'shandika';
//      this.umur = '33';
//     //  this pada funciton expression mengacu pada lexical (local) scope 

//     this.sayHello = function() {
//         console.log(`Hallo Nama saya , ${this.nama} , ${this.umur}`);

//     }
//     console.log(this);
     

// }

// const rifal = new Mahasiswa();


// arrow function

// jika parent ini di ubah menjadi arrow maka error
// karena arrow bukan constructor
// tapi kalau method bisa.
// const Mahasiswa = function()  {
//     this.nama   = 'rifal';
//     this.umur   = '21';

//     // problemnya arrow function tidak menganut consept this
//     // ini akan berbeda ketika membuat object dengan literal
//     // lanjut kebawah.
//     this.sayHello = () => {
//         // console.log(`Hallo Nama saya ${this.nama}, umur saya ${this.umur}`);
        
//     }

// }

// const rifal = new Mahasiswa();



// object literal
// const Mhs1 = {
//     nama: 'rifal',
//     umur: 'rifal',

//     // kalo menggunakan ex function this disini akan mencari nama keluar dan ambil
//     // sayHello: function() {
//     //     console.log(`Hallo Nama saya ${this.nama}, umur saya ${this.umur}`);
//     // }
//     // tapi ini akan beda jikalau arrow function
//     // this.nama akan berisi undifined
//     // jadi this pada arrow fn ini akan mencari this ke parent sampai dapat jika tidak dapat maka di isi undifined
//     sayHello: () => {
//         
//         // this disini  berisi window
//         console.log(this);
        
//     }

// }

// instance mhs.property



// contoh constructor function 2
// let Mahasiswa = function() {
//     this.nama = 'rifal',
//     this.umur = '33',

//     // ini function expresion
//     // fn ini tidak kena hoisting karena di simpan di varibale terlbih dahulu
//     this.sayHello = function() {
//         console.log(`Hallo Nama saya ${this.nama}, umur saya ${this.umur}`);   
//     }

    // ini declarasi function
    // karenaa hoiting this disini akan mencari di local terlebih dahulu. jika tidak ada maka function ini akan pindah keluar. (global scope)
    //  
    // setInterval(function() {
    //     // jalankan dari setiap fn ini, setiap 0.5 detik
    //     // this di fn ini akan langsung mengacu pada global
    //     // console.log(this.umur++); //hasil nya NAN
    //     // console.log(this); //hasinya windows
        
    // }, 500)

    // solusinya arrow function
    // karena arrow function tidak memiliki konsep this
    // maka arrow fn akan mencari this ke lexical scopenya atau ke hanya mencari di dalam parent nya.
    // setInterval( () => {
        
    //     console.log(this.umur++);
        
         
    // }, 500)

    
// }


// const rifal = new Mahasiswa()





// implementasi dunia nyata
const box = document.querySelector('.box');

box.addEventListener('click', function() {
    let satu    = 'size';
    let dua     = 'caption';
    
    
    if(this.classList.contains(satu)) {
        [satu, dua] = [dua , satu]
    }

    // jika menggunakan fn biasa this disini akan mengacu kebox yang diluar variable
    // jika menggunakan arrow fn makan yang keluar windows
    // console.log(this);

    this.classList.toggle('size');

    setTimeout( () => {
        this.classList.toggle('caption');
    }, 600)
    
});

