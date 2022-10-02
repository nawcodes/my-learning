const http = require('http');
const fs = require('fs');


const renderHTML = (path, res) => {
    
}

const server = http.createServer((request,respond) => {
    
    respond.writeHead(200, {
     'Content-Type' : 'text/html',   
    })

    const url = request.url;
    
    if( url === '/contact') {
        respond.write('<h1>ini adalah halaman about</h1>');
        respond.end();
    }else if(url === '/about'){
        fs.readFile('./about.html', (err,data) => {
            if(err) {
                respond.writeHead(404);
                respond.write('Error: File Not Found');

            }else{
                respond.write(data);
            }
            respond.end();
       });
    }else {
       fs.readFile('./index.html', (err,data) => {
            if(err) {
                respond.writeHead(404);
                respond.write('Error: File Not Found');

            }else{
                respond.write(data);
            }
            respond.end();
       });
    }

    
});

server.listen(3000, () => {
    console.log('Listenting on port 3000');
});