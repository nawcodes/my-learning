// this is core modules
// 1. modules files system
const fs = require('fs');
const { stdin } = require('process');
// console.log(fs);

// menulis String Ke FIles MEmeakai fungsi fs writeFilesSyncs dari keluaran modules secara SYNCROUNOUS
// try{
// fs.writeFileSync('data/writeFileSync.txt','Mencoba fungsi writeFileSync secara syncronous nodeJs!');
// } catch(e) {
//     console.log(e);
// }

// Menulis FILES SECARA ASYNCROUNOUS
// fs.writeFile('data/writeFileAsync.txt', 'Hello World Secara asyncrounous' , (err) => {
//     console.log(err);
// });


// membaca isi files syncronous

// const readData = fs.readFileSync('data/writeFileSync.txt', 'utf-8'); // result Buffer not string
// console.log(readData);


// const readDataAsync = fs.readFile('data/writeFileAsync.txt', 'utf-8',(err, data) => {
//    if(err) throw err;
//    console.log(data);
// });


// Modules core lanin
// load modules
const readline = require('readline');
// create input output
const rl =  readline.createInterface(
    {
        input:process.stdin,
        output:process.stdout,
    }
);

rl.question('Siapa nama anda?', (nama) => {
    rl.question('Nomor HP anda?', (noHp) => {

        // const data 
        const contacts = {
            nama,
            noHp,
        }
        
        // read file when ready
        const file = fs.readFileSync('data/contacts.json', 'utf-8');
        const fileParse = JSON.parse(file);

        // push data contact to fileParse 
        fileParse.push(contacts);


        fs.writeFileSync('data/contacts.json', JSON.stringify(fileParse));



        // close
        rl.close();

    });
})
