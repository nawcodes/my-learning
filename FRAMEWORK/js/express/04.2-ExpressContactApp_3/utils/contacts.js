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


// write / replace contacts.json
const saveContacts = (contacts) => {
    fs.writeFileSync('data/contacts.json', JSON.stringify(contacts));
}

// add func
const addContact = (contact) => {
    const contacts = loadContact();
    contacts.push(contact);
    saveContacts(contacts);
}

const checkDuplicate = (nama) => {
    const contacts = loadContact();
    return contacts.find((contact) => contact.nama === nama);
}


const updateContact = (contactNew) => {
    const contacts = loadContact();
    const filteredContacts = contacts.filter(contact => contact.nama !== contactNew.nama_hidden);
    // delete property an object nama_hidden before push to object
    delete contactNew.nama_hidden;
    // update an object in this function before to push the original object 
    filteredContacts.push(contactNew);
    // save to original object
    saveContacts(filteredContacts);
}

const deleteContact = (nama) => {
    const contacts = loadContact();
    const filteredContacts = contacts.filter(contact => contact.nama !== nama);
    saveContacts(filteredContacts);
}

module.exports = {loadContact, findContact, addContact, checkDuplicate, deleteContact, updateContact};








