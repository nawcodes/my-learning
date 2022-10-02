// bongkar array dan masukan ke variable baru

// cara lama 

// const mhs = [
//     'rifal',
//     '33',
//     'rifalnurchya@gmail.com'
// ];

// const nama = mhs[0];
// const umur = mhs[1];
// const email = mhs[2];

// console.log(nama);
// console.log(umur);
// console.log(email);


// cara modern
// array

// const mhs = [
//     'rifal',
//     '33',
//     'rifalnurchya@gmail.com'
// ];

// const [nama,umur,email] = mhs;

// console.log(nama);
// console.log(umur);
// console.log(email);


// object

// const mhs = {
//     nama    : 'nama',
//     umur    :'33',
//     email   :'rifalnurchya@gmail.com'
// };

// const {nama,umur,email} = mhs;

// console.log(nama);
// console.log(umur);
// console.log(email);


// penggunaan biasa
// destructiing var / assignment


// pemisahan bisa di skip
// const mhs = [
//      'rifal',
//     '33',
//     'rifalnurchya@gmail.com'
// ];


// const [nama, , email] = mhs;
// console.log();
 

// swap / pertukaran isi array
    // let a = 1;
    // let b = 2;

    // console.log(a);
    // console.log(b);
    // [a,b] = [b,a]
    // console.log(a);
    // console.log(b);
    

// return value pada function
// function array() {
//     return [1,2];
// }

// const [a,b] = array();
// console.log(a); // 1
// console.log(b); // 2


// Rest Paramaeter : banyak array

// const [a, ...arrays] = [1,2,3,4,5,6,7,8];
// a = 1
// arrays = 2,3,4,,5 dst



// Desctrucring Obeject


// const objLiteral = {
//     nama : 'rifal',
//     umur : 33
// };

// // variable harus sama dengan nama properti
// const {nama, umur} = objLiteral;


// tanpa deklarasi object (bisa)

// ({nama, umur } = {nama : 'rifal', umur : 33});
// console.log(nama);





// kasih nama baru pada object
// const objLiteral = {
//     nama : 'rifal',
//     umur : 33
// };

// // variable harus sama dengan nama properti
// const {nama: n, umur: u} = objLiteral;
// console.log(n);



// bisa memberikan default values
// const objLiteral = {
//     nama : 'rifal',
//     umur : 33,
//     email : 'rifalnurchya@gmail.com'    
// };

// // variable harus sama dengan nama properti
// const {nama, umur, email = 'email@default.com'} = objLiteral;
// console.log(email);



// bisa memberikan nilai default dan juga asign ke variable baru

// const objLiteral = {
//     nama : 'rifal',
//     umur : 33,
//     email : 'rifalnurchya@gmail.com'    
// };

// // variable harus sama dengan nama properti
// const {nama:n, umur:u, email:e = 'email@default.com'} = objLiteral;
// console.log(e);



// object Rest parameter
// const objLiteral = {
//     nama : 'rifal',
//     umur : 33,
//     email : 'rifalnurchya@gmail.com'    
// };

// // variable harus sama dengan nama properti
// const {nama, ...objects} = objLiteral;
// console.log(objects);


// mengambil field pada object , yabg obj itu kita kirim sebahai paramamter pada function
// impl API biasanya.

// cara bianyal
// const objLiteral = {
//     id : 12345,
//     nama : 'rifal',
//     umur : 33,
//     email : 'rifalnurchya@gmail.com'    
// };

// function getIdObj(obj) {
//     return obj.id;
// }

// console.log(getIdObj(objLiteral));















