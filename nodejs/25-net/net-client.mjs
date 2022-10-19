import net from 'net';


const client = net.createConnection({ port: 3000 }, () => {
    console.log('Client connected');
});


client.addListener('data', (data) => {
    console.log(`Received data from server: ${data.toString()}`);
});

setInterval(() => {
    client.write('Hello, server!');
}, 2000);
