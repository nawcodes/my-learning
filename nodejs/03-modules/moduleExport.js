function cetakNama(nama) {
    console.log(nama);
}

const PI = 3.14;

const mhs = {
    nama: 'rifal',
    umur : 19,
    cetakMhs() {
        return  `Hallo nama saya ${this.nama} umur saya ${this.umur} tahun`;
    }
}


class Orang  {
    constructor() {
        console.log('Constructor');
    }
} 


// // export fn
// module.exports.cetakNama = cetakNama;
// // export property
// module.exports.PI = PI;
// //  export object
// module.exports.mhs = mhs;
// // module export class
// module.exports.orangClass = Orang ;


// cara export tidak seribet diatas
module.exports = {
    cetakNama : cetakNama,
    PI:PI,
    mhs:mhs,
    Orang : Orang,
};




