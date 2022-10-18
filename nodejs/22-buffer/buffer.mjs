// https://nodejs.org/docs/latest-v16.x/api/buffer.html
// Buffer merupakan object yang berisikan byte dengan panjang tetap.
// Buffer merupakan turunan dari tipe data Uint8Array

// konversi string ke buffer
const buffer = Buffer.from('Hello World');
console.log(buffer);


// buffer encoding
const buffer2 = Buffer.from('Hello World', 'utf8');
console.log(buffer2.toString('base64'));
console.log(buffer2.toString('hex'));

// buffer base64 to string
const buffer3 = Buffer.from('SGVsbG8gV29ybGQ=', 'base64');
console.log(buffer3.toString('utf8'));

