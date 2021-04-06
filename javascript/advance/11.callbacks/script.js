// Callback 
// Syncronous Callback
// jarang digunakan

// function hallo(nama) {
//     alert(`Hallo Nama Saya ${nama}`);
// }

// function panggilNama(name) {
//     // 2 setalah dapat nama
//     let nama = prompt('Masukan nama kamu:');
//     // lalu jalankan
//     name(nama);
// }

// // pertama
// // panggilNama(hallo);
// panggilNama(nama => alert(`hallo nama saya ${nama}`));


// Syncronous task lama
// const mhs = [
//     {
//         "nama" : "rifal nurjamil",
//         "nim" : "20180050049",
//         "email" : "rifalnurchya@gmail.com",
//         "jurusan" : "Sistem Informasi",
//         "jurusan" : "Teknik Informatika",
//         "idDosenWali" : 1 
//     },
//     {
//         "nama" : "Shandika",
//         "nim" : "20180050041",
//         "email" : "Shandika@gmail.com",
//         "jurusan" : "Teknologi",
//         "idDosenWali" : 2
//     },
//     {
//         "nama" : "Emuh tar",
//         "nim" : "20180050012",
//         "email" : "emuhtare@gmail.com",
//         "jurusan" : "Sistem Awawm",
//         "idDosenWali" : 3
//     }
// ];

// // exc 1
// console.log('mulai');
// // exc 2
// // ini HOF merupakan sebuah callback juga
// mhs.forEach(m => {
//     // jika lama kemungkina code selanjutya mungkin tak akan di exc
//     for (let i = 0; i < 10000000; i++) {

//         let date = new Date();
        
//     }

//     console.log(m.nama)
// });
// // exc 3
// console.log('selesai');



// MAKA DARI ITU DI BUTUHKAN ASYNCRONOUS
// Asyncronous Callback 
// menggunakan vanila js

// Membuat fn yang ketika fn itu di jalankan dia REQUEST KE AJAX
// Simulasi data di DATA/mahasiswa.json harusnya ke API
// param url itu penyimpanan datanya
// success dan error merupakan callback [request]
// function getDataMahasiswa(url, success, error) {
//     // declare AJAX
//     let xhr = new XMLHttpRequest();

//     // if ready run the function
//     xhr.onreadystatechange = function name() {
//         if(xhr.readyState === 4) {
//             if(xhr.status === 200) {
//                 // bungkus param callback
//                 success(xhr.response);
//             }else if(xhr.status === 404) {
//                 error();
//             }
//         }
//     }

//     // lalu jalanin ajaxnya
//     xhr.open('get', url);
//     xhr.send();
// } 


// // jika mau check asyncrounous kasi log
// console.log('mulai');

// // jila mau pakai ini kamu harus membuat fungsi syuccess dan error
// // getDataMahasiswa('data/mahasiswa.json', success, error);
// // atau bisa juga dengan anonymous function
// // ingat parameter successnya
// getDataMahasiswa('data/mahasiswa.json', result => {
//     // result masih dalam text
//     // console.log(result);
//     // result dalam bentuk object
//     // console.log(JSON.parse(result));
//     // tampilkan hanya nama saja
//     const mhs = JSON.parse(result);
//     mhs.forEach(m => console.log(m.nama));
    
    
// }, () => {

// });

// console.log('selesai');
// // result 
// // mulai
// // selesai
// // event loop


// Asyncronous Callback 
// menggunakan JQUERY
// jquery CDN minified

// check jqeury 
// console.log('mulai');
// // jsquery jalanin ajax yang parameterunya OBJ
// $.ajax({
//     // mau kemana urlnya
//     url: 'data/mahasiswa.json',
//     // kalo success mau ngapain ?
//     success : (mhs) => {
//         mhs.forEach(m => console.log(m.nama)
//          );        
//     },
//     // kalo error mau ngapain
//     error : (e) => {
//         console.log(e.responseText);
        
//     }

// })
// console.log('sleesai');



