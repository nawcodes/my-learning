// Process merupakan object global yang berisi informasi tentang proses nodejs yang sedang berjalan
// Process juga merupakan instance dari EventEmitter, sehingga kita bisa menambahkan listener kedalam Process

// https://nodejs.org/api/process.html

import process from 'process';

process.addListener('exit', (code) => {
    console.log(`Process exit with code ${code}`);
})

console.info(process.version);
console.info(process.versions);
console.info(process.argv);


