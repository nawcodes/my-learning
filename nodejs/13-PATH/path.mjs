// Path adalah modul yang berisi fungsi untuk bekerja dengan lokasi file

import path from 'path';

const file = 'C:\\Users\\Fall\\Documents\\GitHub\\nodejs\\13-PATH\\path.mjs';

console.info(path.basename(file));
console.info(path.dirname(file));
console.info(path.extname(file));