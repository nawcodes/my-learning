// https://nodejs.org/dist/latest-v16.x/docs/api/os.html 

import os from 'os';


console.info(os.freemem());
console.info(os.platform());
console.table(os.cpus());
console.info(os.homedir());
console.info(os.hostname());
console.info(os.networkInterfaces());
console.info(os.userInfo());
console.info(os.tmpdir());
console.info(os.type());
console.info(os.uptime());
console.info(os.version());