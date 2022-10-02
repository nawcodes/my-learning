
const mhs = ['shandika', 'rifal', 'erik'];

// for biasa

// for (let i = 0; i < mhs.length; i++) {
//     const element = mhs[i];
//     console.log(element);
    
// }

// forEach

// mhs.forEach(m => m);
// paramater nya 2 ketika ingin mengakses index
// mhs.forEach((m,i)  => console.log(`${m} adalah mahasiswa ke-${i}`));


// FOROF
// FOR OF HANYA UNTUK ITTERABLE
// FOR OF TIDAK PUNYA INDEX
// for (const m of mhs) {
//     console.log(m);
// }

// string
// jika dia string akan melooping setiap tiap karakter
// const nama = 'shandika';
// for (const n of nama) {
//     console.log(n);   
// }

// jika ingin memakai INDEX
// menggunakan desctrutin dan entries
// for (const [m,i] of mhs.entries()) {
//     // m akan menjadi index
//     // i akan menjadi mahasiswa

// //    console.log(`${m + 1} adalah mahasiswa ke-${i }`);
    

    
// }

// node list
// query ke DOM

const liNama = document.querySelectorAll('.list-name');

// pakai foreach harus browser terbaru
// liNama.forEach(n => console.log(n.textContent));

// for (const n  of liNama) {
//     console.log(n);
// }

// bisa di pakai untuk argument function
//jumlah kan angka yang ada di parameter ketika di panggil
// function jumlahkanAngka() {
// let jumlah = 0;
// //    return [1,3,4,5,6,7].reduce((a, i) => a + i )
// for (const a of arguments) {

//     jumlah += a;
    
    
// }  

// console.log(jumlahkanAngka(1,2,3,4,6));



// FOR IN
// HANYA UNTUK ENUMERABLE  

const obj = {
    nama:'rifal',
    umur : 33,
    email : 'rifalnurchya@gmail.com'
};

for (const a in obj) {
    // hanya properti
//    console.log(a);
    
//    console.log(obj[a]);
   
}





