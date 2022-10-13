// https://nodejs.org/dist/latest-v16.x/docs/api/fs.html

import fs from 'fs/promises';

const file = 'file-system.mjs';
const buffer = await fs.readFile(file);

console.info(buffer.toString());


fs.writeFile('fileWrite.txt', 'Hello World', 'utf8')

