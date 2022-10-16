import dns from 'dns/promises';

const ip = dns.lookup('www.google.com')
    .then((address) => {
        console.log(address);
    })
// console.log(ip);
   
// Run: node dns.mjs