// How To Make Object
// 1. Object Literal
    // object ini hanya berasumsiai 1 variable 1 object (harus duplikat jika ingin banyak dengan var berbeda)
    // problem : tidak efektik membuat object banyak

    // let mhs = {
    //     name    : 'Rifal Nurjamil',
    //     energy  : 10,
    //     makan   : function (porsi) {
    //         this.energy = this.energy + porsi;
    //         console.log(`Hallo ${this.nama}, Selamat Makan!, stats energy : ${this.energy}`);
    //     }
    // }




// 2. Function Declaration
    // problem : setiap kali instance properti yang dibuat meskipun tidak di panggil tetap di panggil, itu akan memakan banyak resource

    // templating
    // function  Mahasiswa(nama, energi) {
    //     // declaration want to make object
    //     let mhs = {};
    //     // isi properti dengan param
    //     mhs.nama    = nama;
    //     mhs.energi  = energi;

    //     // method
    //     mhs.makan = function (porsi) {
    //         this.energi += porsi;
    //         console.log(`Hallo ${this.nama}, Selamat Makan. Stats Energi : ${this.energi}`);
    //     }

    //     mhs.main = function (jam) {
    //         this.energi -= jam
    //         console.log(`Hallo ${this.nama}, selamat main, stats energi : ${this.energi}`);
    //     }
    //     //jangan lupa return object
    //     return mhs;
    // }

    // instansiai / panggil
    // let rifal = Mahasiswa('rifal', 10);



// 3. Constructor


// function Dosen(nama, energi) {
//     this.nama = nama;
//     this.energi = energi;


//     this.makan = function (porsi) {
//         this.energi += porsi;
//         console.log(`Hallo ${this.nama} , Stats Energi : ${this.energi}`);
//     }
    
// }


// let shandika = new Dosen('shandika galih', 10);

// 4. Object.create 

// const KMahasiswa = {
//     makan: function(porsi) {
//         this.energi += porsi;
//         console.log(`${this.nama} , stats energi ${this.energi}`);

//     },

//     main : function (jam) {
//         this.energi += porsi;
//         console.log(`${this.nama} , stats energi ${this.energi}`);
//     }


    
// }

// function Dosen(nama, energi) {
//     let mahasiswa = {};
//     mahasiswa.nama = nama;
//     mahasiswa.energi = energi;
    
//     mahasiswa.makan = KMahasiswa.makan;
//     mahasiswa.main = KMahasiswa.main;

//     return mahasiswa;

    
    
// }


// let shandika = new Dosen('shandika galih', 10);

// const KMahasiswa = {
//     makan: function(porsi) {
//         this.energi += porsi;
//         console.log(`${this.nama} , stats energi ${this.energi}`);

//     },

//     main : function (jam) {
//         this.energi -= jam;
//         console.log(`${this.nama} , stats energi ${this.energi}`);
//     },

//     tidur : function (jam) {
//         this.energi += jam * 2;
//         console.log(`${this.nama} , stats energi ${this.energi}`);

//     }


    
// }

// function Dosen(nama, energi) {
//     let mahasiswa = Object.create(KMahasiswa);
//     mahasiswa.nama = nama;
//     mahasiswa.energi = energi;
//     return mahasiswa;

// }


// let shandika = new Dosen('shandika galih', 10);

// prototype 
// versi object menggunakan prototypel

// function DecMahasiswa(nama, nim) {
    // 1. ciri declaration
        // butuh
            // let mahasiswa = {};
            // let mahasiswa = Object.create(nameMethod);
    // declaration

    // 1.1 constructor
        // dibelakang layar membuat object 
        // let this = {} atau lebih jelasnya >
        // let this = Object.create(DecMahasiswa.prototype)
    
    // this.nama   = nama;
    // this.nim    = nim;
    // this.energi = 10;
    
        // dan return this


    // 2. ciri declaration
        // butuh 
        // return mahasiswa;
    // 
// }

// bikin method di prototype

// DecMahasiswa.prototype.makan = function (porsi) {
//     this.energi += porsi;
//     return `Hallo ${this.nama}, Stats Energi : ${this.energi}`;
// }

// DecMahasiswa.prototype.main = function (jam) {
//     this.energi -= jam;
//     return `Hallo ${this.nama}, Stats Energi : ${this.energi}`;

// }


// let rifal = new DecMahasiswa('rifal', 20180050049);

// versi class mirip dengan prototype
    // versi class hanya untuk bungkus
    // di belakang layar mereka membuat object dengan cara prototyping

class Mahasiswa {
    constructor(nama, energi) {
        this.nama = nama;
        this.energi = energi;
    }

    makan(porsi) {
        this.energi += porsi;
        return `Hallo ${this.nama}, Stats Energi : ${this.energi}`;
    }  
}

let rifal = new Mahasiswa('rifal nurjamil', 10);


// end prototype