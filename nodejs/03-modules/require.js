// const fs = require('fs'); // ini contoh core module
// const cetakNama  = require('./moduleExport'); //ini import modules local
// const moment = require('moment');  //iin third party module / npm module / node_modules




const moduleExport  = require('./moduleExport'); 



console.log(moduleExport); // return object
console.log(moduleExport.PI,
moduleExport.cetakNama('rifal'),
moduleExport.mhs , moduleExport.mhs.cetakMhs(),
new moduleExport.Orang());  