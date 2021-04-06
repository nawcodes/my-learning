// callback menggunakan JQUERY

// $({
//     url = 'example.com',
//     success = m => {
//         console.log(m);
//     }
// });

// call back menggunakan JS BAWAAN

// const xhr = new XMLHttpRequest();

// xhr.onreadystatechange( function () {
//     if(xhr.status === 200) {
//         if(xhr.readyState === 4) {
//             console.log(JSON.parse(xhr.response));
//         } 
//     }else{
//         console.log(xhr.response);
//     }
// });

// xhr.open('get', 'example.com');
// xhr.send();

// menggunakan FETCH JSMODERN

// const movies = fetch('http://www.omdbapi.com/?apikey=93670083&s=avengers')
// .then(response => response.json())
// .then(response => console.log(response));


// PROMISE
// OBJECT Yang Mepresentasikan keberhasilan / kegagalan sebuah event yang asyncronous di masas yang akan datang
// 1. Object yang mempresentasikan keberhasilan / Kegagalan sebuah Event yang asyncronous di masa yang akan datang.
//     2. Dan yang namanya janji (Pasti Terpenuhi / Inkar)
//     
//         <small>fn state(Fullfilled / Rejected / Pending)</small>
//         <br>
//         <small>fn state(Terpenuhi / Ingkari / Waktu Lama Menunggu)</small>
//     
//     3. Solusi Untuk menangani callback hell (callback menjorok kedalam)
//     4. Callback (Resolve / Reject / Finnaly)
//     5. Action(then / catch) 

// BIASANYA PROMISE AKAN DI PAKAI UNTUK API

// CONTOH 1
// let ditepati = false;
// const janji1 = new Promise((resolve, reject) => {
//     if(ditepati) {
//         resolve('Janji telah di tepati');
//     }else{
//         reject('Ingkar Janji :');
//     }
// });

// // console.log(janji1);
// // jika mau mengambil resolvenya

// janji1
// .then(rspn => console.log('OK: ' + rspn))
// .catch(rspn => console.log('NOT OK ' + rspn));



// Contoh Janji nggak langsung di tepati
// let ditepati = true;
// const janji2 = new Promise((resolve, reject) => {
//     if(ditepati) {
//         setTimeout(() => {
//             resolve('Ditepati setelah beberapa waktu');
//         }, 2000); 
//     } else {
//         setTimeout(() => {
//             reject('Ditepati setelah beberapa waktu');
//         }, 2100); 
//     }
// });

// check dia asyncornous apa tidak
// console.log('mulai');
// // console.log(janji2.then(() => console.log(janji2))); // jika pending karena belum jalanin thennya
// janji2
// .finally(() => console.log('selesai menunggu')
// )
// .then(rspn => console.log('OK: ' + rspn))
// .catch(rspn => console.log('NOT OK ' + rspn));

// console.log('end');


// Promise.all
// untuk mejalankan banyak promise ketika mau di jalankan sekaligus
// anggap aja kalian mau menjalankan 2 API yang berbeda
// API 1 untuk data film
//  

const film = new Promise( resolve => {
    setTimeout(() => {
        resolve([{
            judul : 'avengere',
            sutradara : 'shadnika',
            pemeran : 'doody' 
        }]);
    }, 1000); 
});


const cuaca = new Promise( resolve => {
    setTimeout(() => {
        resolve([{
            kota : 'Bandung',
            temp : 26,
            kondisi : 'Cerah Berawan'
        }]);
    }, 500)
});

// jika jalanin satu satu 
// film.then(response => console.log(response)
// );
// cuaca.then(response => console.log(response)
// );


Promise.all([film, cuaca])
// .then(response => console.log(response))
.then(response => {
    const [film, cuaca] = response;
    console.log(film);
    console.log(cuaca);

    
});



// MENYELESAIKAN CALLBACK HELL



























