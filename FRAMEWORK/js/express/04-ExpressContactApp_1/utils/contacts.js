const fs = require('fs');


//const dirPath = './data';
// // async
// fs.exists(dirPath, (e) => {
//     if(e) {
//         console.log(`${dirPath} Allready exists`);
//     }else{
//         fs.mkdirSync(dirPath);
//     }
// });

// // make contact.json

// const dataPath = './data/contacts.json';
// fs.exists(dataPath, (e) => {
//     if(e) {
//         console.log(`${dataPath} Allready exist`);
//     }else{
//         fs.writeFile(dataPath, '[]' , 'utf-8', (e) => {
//             console.log(`${dataPath} has been created`);
//         });
//     }
// });


// const loadContact = () => {
//     const fileBuffer = readFile(`data/contact.json`, 'utf-8' , (err, data) => {
//         if(err) {
//             throw err;
//         }
//         console.log(data);
//         return data;
//     });

//     const contacts = JSON.parse(fileBuffer);
//     return contacts; 
// }

// sync
const dirPath = './data';
if(!fs.existsSync(dirPath)) {
    fs.mkdirSync(dirPath);
}

const dataPath = './data/contacts.json';


if(!fs.existsSync(dataPath)) {
    fs.writeFileSync(dataPath, '[]', 'utf-8');
}

const loadContact = () => {
    const fileBuffer = fs.readFileSync('./data/contacts.json', 'utf-8');
    const contacts = JSON.parse(fileBuffer);
    return contacts;
}

const findContact = (nama) => {
    const contacts = loadContact();
    const contact = contacts.find(contact => contact.nama.toLowerCase() === nama.toLowerCase());
    return contact;
}

module.exports = {loadContact, findContact};






