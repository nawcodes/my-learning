const express = require('express');
const expressLayouts = require('express-ejs-layouts');
const {loadContact, findContact, addContact, checkDuplicate} = require('./utils/contacts');
const { check,body, validationResult } = require('express-validator');
const session = require('express-session');
const cookie = require('cookie-parser');
const flash = require('connect-flash');

const app = express()
const port = 3000


// config flashdata;
app.use(cookie('secret'));
app.use(session({
  cookie: {maxAge: 6000},
  secret: 'secret',
  resave: true,
  saveUninitialized: true
}));
app.use(flash());


app.set('view engine', 'ejs');
app.use(expressLayouts);
app.use(express.static('public'));
app.use(express.urlencoded({extended: true}));



app.get('/', (req, res) => {

  res.render('index', 
  {
    name: 'rifal nurjamil',
    title: 'ExpressWithEJS',
    layout: 'layouts/main-layout'
  });

})

app.get('/about', (req, res, next) => {

  res.render('about', {

    layout: 'layouts/main-layout',
    title: 'About Page',

  });

})

app.get('/contact/add', (req, res, next) => {
  res.render('contact-add', {
    title : 'Contact Form',
    layout: 'layouts/main-layout'
  });
});

app.get('/contact', (req, res) => {
  const contacts = loadContact();
  res.render('contact', {

    layout: 'layouts/main-layout',
    title: 'Contact Page',
    contacts,
    msg: req.flash('msg'),
  });
})

app.post('/contact', 
  [
    body('nama').custom((value) => {
      const duplicate = checkDuplicate(value);
      if(duplicate) {
        throw new Error('Nama kontak sudah digunakan');
      }
      return true;
    }),
    check('email', 'Email tidak valid!').isEmail(),
    body('nohp', 'No hp tidak valid!').isMobilePhone('id-ID'),
  ]
,(req,res) => {
    const errors = validationResult(req);
    if(!errors.isEmpty()) {
      res.render('contact-add', {
        title: 'Form Contact',
        layout: 'layouts/main-layout',
        errors: errors.array()
      })
    }else {
      addContact(req.body);
      req.flash('msg', 'Data contact has been saved');
      res.redirect('/contact');
    }
});

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



