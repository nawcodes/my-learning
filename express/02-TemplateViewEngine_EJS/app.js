const express = require('express')
const app = express()
const port = 3000

// layouting 
const expressLayouts = require('express-ejs-layouts');


app.use(expressLayouts);
app.set('view engine', 'ejs');


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

app.get('/about', (req, res) => {

res.render('about', {

  layout: 'layouts/main-layout',
  title: 'About Page',

});


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



