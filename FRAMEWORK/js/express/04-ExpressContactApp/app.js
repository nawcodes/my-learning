const express = require('express');
const expressLayouts = require('express-ejs-layouts');
const {loadContact, findContact} = require('./utils/contacts');
const app = express()
const port = 3000


app.use(expressLayouts);
app.set('view engine', 'ejs');


app.use(express.static('public'));



app.get('/', (req, res) => {


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




})

app.get('/contact', (req, res) => {
  const contacts = loadContact();
  res.render('contact', {

    layout: 'layouts/main-layout',
    title: 'Contact Page',
    contacts,

  });
})

app.get('/contact/:nama', (req, res) => {
  const contact = findContact(req.params.nama);
  
  
  res.render('detail', {
    layout: 'layouts/main-layout',
    title: 'Detail Contact',
    contact,
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



