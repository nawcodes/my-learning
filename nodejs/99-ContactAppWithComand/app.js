const yargs = require('yargs');
const contacts = require('./contacts');
// mengambil argument dari command line
// console.log(process.argv[2]);
// const command = process.argv[2];
// if(command == 'add') {

// }else if(command == 'remove') {

// }else if(command == 'list') {

// }
// console.log(yargs.argv);
// test
// yargs.command('add', 'Add New Contact' , () => {} , (argv) => {
//  console.log(argv.nama);
// });

// yargs.parse();


// 2 run
yargs.command({
    command: 'add',
    describe: 'Add new contact',
    builder: {
        nama: {
            describe: "Nama Lengkap",
            demandOption : true,
            type: 'string'
        },
        email : {
            describe: "Email",
            demandOption : false,
            type: 'string'
        },
        noHP : {
            describe: "No Handphone",
            demandOption : false,
            type: 'string'
        }
    },
    handler(argv) {
        // check result
        // const contact = {
        //     nama: argv.nama,
        //     email: argv.email,
        //     noHP: argv.noHP
        // };
        // console.log(contact);

        // now insert to JSON
        contacts.simpanContact(argv.nama , argv.email , argv.noHP);
    }
}).demandCommand();

// show list contact all
yargs.command({
    command : 'list',
    describe: 'Menampilkan semau nama & no HP contact',
    handler() {
        contacts.listContact();
    }
}) ;


// list detail contact
yargs.command({
    command : 'detail',
    describe: 'Menampilkan detail contact',
    builder: {
        nama: {
            describe: "Nama Lengkap",
            demandOption : true,
            type: 'string'
        }, 
    },
    handler(argv) {
        contacts.detailContact(argv.nama);
    }
}) ;


yargs.command({
    command : 'delete',
    describe: 'Menghapus contacat berdasarkan nama',
    builder: {
        nama: {
            describe: "Nama Lengkap",
            demandOption : true,
            type: 'string'
        }, 
    },
    handler(argv) {
        contacts.deleteContact(argv.nama);
    }
}) ;


yargs.parse();











// const contacts = require('./contacts');
// object destructuring
// const {tulisPertanyaan,simpanContact} = require('./contacts.js');




// const main = async () => {
//     const nama = await tulisPertanyaan('Masukan nama anda : ');
//     const email = await tulisPertanyaan('Masukan email anda :');
//     const noHp = await tulisPertanyaan('Masukan email nomor hp anda :');

//     simpanContact(nama,email,noHp);

// }


// main();

