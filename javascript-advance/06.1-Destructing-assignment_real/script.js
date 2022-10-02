// destructuring function return

// function penjumlahanPerkalian(a, b) {
//     return [a + b, a * b];
// }

// const jumlah = penjumlahanPerkalian(2, 3);
// jika ingin mengambil penjumlahannya saja [0]
// const jumlah = penjumlahanPerkalian(2, 3)[0];

// console.log(jumlah);


// implemntasion on destructuring
// const  [jumlah , kali] = penjumlahanPerkalian(2, 3);

// console.log(jumlah);
// console.log(kali);


// contoh jika return valuenya nambah
// function kalkulasi(a, b) {
//     return [a + b, a-b ,  a * b , a/b ];
// }

// // bongkar menjadi variable 
// const [tambah , kurang , kali , bagi , aljabar = 'tidak ada' ] = kalkulasi(2, 3);

// console.log(kali);
// console.log(aljabar);


// problem jika array urutan variable harus sesuai dengan nama variable



// urutan variable pada object tidak berpengaruh 
// karena nama variable  sudah terasumssi di properti
// function kalkulasi(a, b) {
//     return {tambah : a + b,
//         kurang: a-b , 
//         kali: a * b ,
//         bagi: a/b
//      };
// }

// // bongkar menjadi variable 
// const {bagi, kurang , kali , aljabar = 'tidak ada' } = kalkulasi(2, 3);

// console.log(bagi);
// console.log(aljabar);



// destructuring function argunment

// cara biasa

// const mhs1 = {
//     nama: 'rifal nurjamil',
//     umur : 33,
//     email : 'rifalnurchya@gmail.com'
// }

// function cetakMhs(nama, umur) {
//     return `Hallo Nama Saya ${nama}, Umur saya ${umur} tahun.`;
// }

// console.log(cetakMhs(mhs1.nama, mhs1.umur));

// cara kirim object ke param 
// const mhs1 = {
//     nama: 'rifal nurjamil',
//     umur : 33,
//     email : 'rifalnurchya@gmail.com'
// }

// function cetakMhs(mhs) {
//     return `Hallo Nama Saya ${mhs.nama}, Umur saya ${mhs.umur} tahun.`;
// }

// console.log(cetakMhs(mhs1.nama, mhs1.umur));


// cara destructuring 
// const mhs1 = {
//     nama: 'rifal nurjamil',
//     umur : 33,
//     email : 'rifalnurchya@gmail.com'
// }

// function cetakMhs({nama, umur}) {
//     return `Hallo Nama Saya ${nama}, Umur saya ${umur} tahun.`;
// }

// console.log(cetakMhs(mhs1));

// cara destructuring pada object kompleks
// const mhs1 = {
//     nama: 'rifal nurjamil',
//     umur : 33,
//     email : 'rifalnurchya@gmail.com',
//     nilai : {
//         tugas: 80,
//         uts : 85,
//         uas : 75
//     }
// }

// function cetakMhs({nama, umur, nilai: {tugas, uts, uas}}) {
//     return `Hallo Nama Saya ${nama}, Umur saya ${umur} tahun, dan nilai uas saya adalah ${uas}`;
// }

// console.log(cetakMhs(mhs1));










