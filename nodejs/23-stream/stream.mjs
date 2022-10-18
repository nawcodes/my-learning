import fs from 'fs';


// step 1: create a file 
const writer = fs.createWriteStream('file.txt')
writer.write('Hello, world!')
writer.write('Chuck');
writer.end();


// step 2: read a file
const reader = fs.createReadStream('file.txt');
reader.addListener("data", (file) => {
    console.log(file.toString());
});
