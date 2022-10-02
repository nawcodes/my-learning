const express = require('express');
const morgan = require('morgan');
const app = express()
const port = 3000

// layouting 
// third party middle ware
const expressLayouts = require('express-ejs-layouts');
// end third party middleware

app.use(expressLayouts);
app.use(morgan('dev'));
app.set('view engine', 'ejs');




// 03-StartMiddleWare
//http://expressjs.com/en/guide/using-middleware.html#using-middleware
 


  // Built In MiddleWare
app.use(express.static('public'));
// fungsi ini di khususkan untuk file akses yang akan di public kan, gambar, etc
  // End Built In MiddleWare

app.use((res,req,next) => {
  console.log('Time:', Date.now());
  next(); // next mencari path sesuai dengan url yang di akses
});

// End 03-StartMiddleWare


app.get('/', (req, res) => {
// old 
// res.sendFile('./index.html', { root: __dirname })


const mahasiswa = [
  {
    nama: 'rifalnurchya',
    email : 'rifalnurchya@gmail.com',
  },
  {
    nama: 'erik',
    email : 'erik@gmail.com',
  },
  {
    nama: 'ucup',
    email : 'ucup@gmail.com',
  },
];

// ejs | panggil halaman
res.render('index', 
{
  name: 'rifal nurjamil',
  title: 'ExpressWithEJS',
  mahasiswa,
  layout: 'layouts/main-layout'
});

})

app.get('/about', (req, res, next) => {

  res.render('about', {

    layout: 'layouts/main-layout',
    title: 'About Page',

  });

  // path ini adalah headers
  // setelah next dijalankan akan menuju headers 404
  // error karena tidak bisa mengirim 2 buah headers
  // solved: kecuali salah satu route tidak merender
  // next();  


})

app.get('/contact', (req, res) => {

res.render('contact', {

  layout: 'layouts/main-layout',
  title: 'Contact Page',

});



})


app.get('/product/:id', (req, res) => {
    res.send(`Product ID : ${req.params.id} <br> Category ID: ${req.query.category}`);
})

app.use('/', (req, res) => {
res.status(404);
res.send('<h1>404 Not Found</h1>');
});

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})



