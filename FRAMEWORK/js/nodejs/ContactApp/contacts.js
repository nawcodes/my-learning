
const fs = require('fs');
const chalk  = require('chalk');
const validator  = require('validator');
// const readline = require('readline');

// const rl =  readline.createInterface(
//     {
//         input:process.stdin,
//         output:process.stdout,
//     }
// );


// create a folder data if not exist 
const dirPath = './data';
if(!fs.existsSync(dirPath)) {
   fs.mkdirSync(dirPath);
}

// create file JSON if not exist
const dataPath = './data/contacts.json';
if(!fs.existsSync(dataPath)) {
    fs.writeFileSync(dataPath, '[]', 'utf-8');  
}


// promise question
// const tulisPertanyaan =  (pertanyaan) => {
//     return new Promise((resolve, reject) => {
//         rl.question(pertanyaan, (nama) => {
//             resolve(nama);
//         });
//     });
// };


const loadContact = () => {
    const file = fs.readFileSync('data/contacts.json', 'utf-8');
    const fileParse = JSON.parse(file);
    return fileParse;
}

const simpanContact = (nama,email,noHp) => {
        const contacts = {
            nama,
            email,
            noHp,
        } 
        // read file when ready
        // const file = fs.readFileSync('data/contacts.json', 'utf-8');
        // const fileParse = JSON.parse(file);

        const fileParse = loadContact();

        // validation
        // 1. check duplicates ?
        const duplicate = fileParse.find((contact) => contact.nama === nama);
        if(duplicate) {
            console.log(chalk.red.inverse.bold('Contact sudah terdaftar, gunakan nama lain!'));
            return false;
        }
        // 2. email validation
        if(email){
            if(!validator.isEmail(email)){
                 console.log(chalk.red.inverse.bold('Email tidak valid!'));
                 return false;
            }
        }

        if(noHp){
            if(!validator.isMobilePhone(noHp, 'id-ID')){
                 console.log(chalk.red.inverse.bold('noHP tidak valid!'));
                 return false;
            }
        }
        
        


        // push data contact to fileParse 
        fileParse.push(contacts);


        fs.writeFileSync('data/contacts.json', JSON.stringify(fileParse));

        // close
        // rl.close();
        console.log(chalk.green.inverse.bold('terimakasih sudah memasukan data.'));

}

const listContact = () => {
    const contacts = loadContact();
    console.log(chalk.cyan.inverse.bold('Daftar Kontak.'));
    contacts.forEach(
        (contact, i) => {
            console.log(`${i+1}. ${contact.nama} - ${contact.noHp}`);
        }
    )
}


const detailContact = (nama) => {
    const contacts = loadContact();
    
    // array method find
    const contact = contacts.find((contact) => contact.nama.toLowerCase() === nama.toLowerCase() );
    
    if(!contact) {
            console.log(chalk.red.inverse.bold(`${nama} Tidak di temukan!`));
            return false;
    }else{
            console.log(chalk.cyan.inverse.bold(`${contact.nama}`));
            console.log(chalk.cyan.inverse.bold(`${contact.noHp}`));
            if(contact.email) {
                console.log(chalk.cyan.inverse.bold(`${contact.email}`));
            }

    }
}


const deleteContact = (nama) => {
    const contacts = loadContact();
    const newContact = contacts.filter(
        (contact) => contact.nama.toLowerCase() !== nama.toLowerCase()
    );

    if(contacts.length === newContact.length) {
        console.log(chalk.red.inverse.bold(`${nama} Tidak di temukan!`));
        return false;
    }else{
        fs.writeFileSync('data/contacts.json', JSON.stringify(newContact));
        console.log(chalk.red.inverse.bold(`${nama} berhasil di hapus`));
    }
}

module.exports = {
    simpanContact,
    listContact,
    detailContact,
    deleteContact,
}