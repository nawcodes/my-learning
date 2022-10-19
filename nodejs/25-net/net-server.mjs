// net adalah modul yang digunakan untuk membuat server dan client
// https://nodejs.org/docs/latest-v16.x/api/net.html

import net from 'net';

const server = net.createServer((client) => {
    console.log('Client conected');
    client.addListener('data', (data) => {
        console.log(data.toString());
        client.write(`Hello, client!, ${data.toString()}`);
    });
})

server.listen(3000, () => {
    console.log('Server is running on port 3000');
});