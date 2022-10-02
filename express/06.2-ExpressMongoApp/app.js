const express = require('express');
const expressLayouts = require('express-ejs-layouts');
const methodOverride = require('method-override');

require('./utils/db');

const Contact = require('./model/contact');

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
app.use(methodOverride('_method'));



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

app.get('/contact', async (req, res, next) => {
  // // default as promise
  // Contact.find().then(contact => {
  //   console.log(contact);
  // })

  // async await
  const contacts = await Contact.find()
  res.render('contact', {

    layout: 'layouts/main-layout',
    title: 'Contact Page',
    contacts,
    msg: req.flash('msg'),
  });
})

app.post('/contact', 
  [
    body('nama').custom( async (value) => {
      const duplicate = await Contact.findOne({
        nama: value
      })
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
      Contact.insertMany(req.body, (err, result) => {
        req.flash('msg', 'Data contact has been saved');
        res.redirect('/contact');
      });
    }
});

// app.get('/contact/delete/:nama', async (req, res) => {
//   const contact = await Contact.findOne({nama: req.params.nama});
//   if(!contact) {
//     res.status(404);
//     res.send('404');
//   } else {
//     Contact.deleteOne({
//       _id: contact._id
//     }).then((result) => {
//       req.flash('msg', 'Contact has been deleted');
//       res.redirect('/contact');
//     })
//   }
// });

app.delete('/contact' , async (req, res) => {
    Contact.deleteOne({
      nama: req.body.nama
    }).then((result) => {
      req.flash('msg', 'Contact has been deleted');
      res.redirect('/contact');
    })
});

app.get('/contact/edit/:nama', async (req, res, next) => {
  const contact = await Contact.findOne({nama: req.params.nama});
  res.render('contact-edit', {
    title : 'Contact Form',
    layout: 'layouts/main-layout',
    contact,
  });
});


app.put('/contact', [
    body('nama').custom(async(value, {req}) => {
      const duplicate = await Contact.findOne({nama: value});
      if(value !== req.body.nama_hidden && duplicate) {
        throw new Error('Nama kontak sudah digunakan');
      }
      return true;
    }),
    check('email', 'Email tidak valid!').isEmail(),
    body('nohp', 'No hp tidak valid!').isMobilePhone('id-ID'),
  ] , (req, res) => {
    const errors = validationResult(req);
    if(!errors.isEmpty()) {
      res.render('contact-edit', {
        title: 'Form Edit',
        layout: 'layouts/main-layout',
        errors: errors.array(),
        contact: req.body
      });
      
    }else {
      console.log(req.body);
      Contact.updateOne({
        _id: req.body._id
      },
      {
        $set: {
          nama: req.body.nama,
          email: req.body.email,
          nohp: req.body.nohp,
        },
      }
      ).then((result) => {
        console.log(result);
        req.flash('msg', 'Data contact has been updated');
        res.redirect('/contact');
      })
    }
});

app.get('/contact/:nama', async (req, res) => {
  const contact = await Contact.findOne({nama: req.params.nama});
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



