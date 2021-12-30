const express = require('express')
const app = express()
const port = 3000

app.get('/', (req, res) => {
// cara mengirim object
//   res.json({
//       nama:'rifalnurjamil',
//       email:'rifalnurchya@gmail.com',
//       noHp: 08592131,
//   })

// cara mengirim file ex:html
res.sendFile('./index.html', { root: __dirname })
})

app.get('/about', (req, res) => {
//   res.send('ini adalah halaman about!')
res.sendFile('./about.html', { root: __dirname })

})

app.get('/contact', (req, res) => {
//   res.send('ini adalah halaman contact!')
res.sendFile('./contact.html', { root: __dirname })
})


app.get('/product/:id', (req, res) => {
    // res.send(`Product ID : ${req.params.id} <br> Category ID: ${req.params.idCat}`);
    // on query string ? ex:params?category=shoes
    // /product/:id
    res.send(`Product ID : ${req.params.id} <br> Category ID: ${req.query.category}`);
})

// untuk digunakan error handle page
app.use('/', (req, res) => {
res.status(404);
res.send('<h1>404 Not Found</h1>');
});

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})




// const http = require('http');
// const fs = require('fs');


// const renderHTML = (path, res) => {
    
// }

// const server = http.createServer((request,respond) => {
    
//     respond.writeHead(200, {
//      'Content-Type' : 'text/html',   
//     })

//     const url = request.url;
    
//     if( url === '/contact') {
//         respond.write('<h1>ini adalah halaman about</h1>');
//         respond.end();
//     }else if(url === '/about'){
//         fs.readFile('./about.html', (err,data) => {
//             if(err) {
//                 respond.writeHead(404);
//                 respond.write('Error: File Not Found');

//             }else{
//                 respond.write(data);
//             }
//             respond.end();
//        });
//     }else {
//        fs.readFile('./index.html', (err,data) => {
//             if(err) {
//                 respond.writeHead(404);
//                 respond.write('Error: File Not Found');

//             }else{
//                 respond.write(data);
//             }
//             respond.end();
//        });
//     }

    
// });

// server.listen(3000, () => {
//     console.log('Listenting on port 3000');
// });



