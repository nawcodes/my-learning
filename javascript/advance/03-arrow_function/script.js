// fn expression menjadi arrow fn

// const tampilNama = function(nama) {
//     return `Hallo ${nama}`;
// }

// console.log(tampilNama('rifal nurjamil'));

// contoh 1
// const tampilNama = (nama) => { return `Hallo ${nama}`; }
// console.log(tampilNama('rifal'));
// contoh 2
    // paramnya 2
    // const tampilNama = (nama, waktu) => {
    //     return `hallo , selamat ${waktu} ${nama}`;
    // }
    // console.log(tampilNama('rifal', 'pagi')); 
// contoh 3
    // kalo paramnya 1 boleh gak pake kurung 
    // jika singkat seperti di bawah 
    // boleh tidak menuliskan return dan kurung kurawalnya
    // kalo 2 harus!
    // const tampilNama = nama => {
    //     return  `Hallo ${nama}`;
    // }
    // console.log(tampilNama('rifal'));

    // const tampilNama = nama => `Hallo ${nama}`; //implisit return (singkat)
    // console.log(tampilNama('rifal'));
    
// contoh 4
    // tanpa param
    // const tampilNama = () => {
    //     return `Hallo`;
    // }
    // console.log(tampilNama());
// contoh 5
    // menggunakan function dengan map
    let mahasiswa = ['rifal', 'shandi' , 'galih'];
    // let jumlahHuruf = mahasiswa.map(function(nama){
    //     return nama.length;
    // })
    // console.log(jumlahHuruf);

    // ubah menjadi arrow fn
    // let jumlahHuruf = mahasiswa.map(nama => nama.length);
    // let jumlahHuruf = mahasiswa.map((nama) => {
    //     return nama.length;
    // })

    // ubah array menjadi obj

    let jumlahHuruf = mahasiswa.map((nama) => ({ nama:nama, jumlahHuruf:nama.length }))
    console.table(jumlahHuruf);
    
    
// contoh 6
// contoh 7
// contoh 8
// contoh 9

