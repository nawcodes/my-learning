// https://nodejs.org/docs/latest-v16.x/api/zlib.html#class-options

// zlib adalah modul yang berisi fungsi-fungsi yang berguna untuk melakukan kompresi dan dekompresi data

import zlib from 'zlib';
import fs from 'fs';

const source = fs.readFileSync('zlib.mjs');
const compressed = zlib.gzipSync(source);