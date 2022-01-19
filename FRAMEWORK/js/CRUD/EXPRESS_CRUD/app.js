// call requirement
const express           = require('express'),
      cors              = require('cors'),
      expressLayouts    = require('express-ejs-layouts'),
      Data           = require('./src/model/ex_data'),
      {body, check, validationResult} = require('express-validator');
      
require('./src/utils/db');
// declare requirement
const port = 3000;
const app = express();
// use requirement after declare
app.set('view engine', 'ejs');
app.set('views', './src/views');
app.use(cors());
app.use(expressLayouts);
app.use(express.static('public'));
app.use(express.urlencoded({extended: true}))

// routing handle 
app.get('/', async (req, res) => {
    const data = await Data.find();
    res.render('page/index', {
        layout: 'layouts/main-layout',
        title : 'Home',
        data: data,
    });
});

app.get('/data/create', (req, res) => {
    res.render('page/create-form', {
        layout: 'layouts/main-layout',
        title: 'Create form',
    })
});

app.post('/data',
 [
     body('name', 'Field Full Name is required').exists({checkFalsy: true}),
     check('email', 'Email must be valid email').isEmail(),
     body('phone', 'Field Phone is Required & must be ID format').isMobilePhone('id-ID'),
 ],
 (req, res) => {
    const errors = validationResult(req);
    if(!errors.isEmpty()) {
        // res.send(errors);
        res.render('page/create-form', {
            title: 'Create form',
            layout: 'layouts/main-layout',
            errors : errors.array()
        })
    }else{
        const uuid =  String(Math.floor(Math.random() * Date.now())).substr(0,11);
        try {

            Data.insertMany({
            uuid: uuid,
            name: req.body.name,
            email: req.body.email,
            phone: req.body.phone,
            
            }, (err, result) => {
                res.redirect('/');
            });
            
        } catch (error) {
            console.log(error);
            res.status(500).send({message: error.message})
        }
        
        // res.send(uuid);
    }
    
});


app.use('/', (req, res) => {
    res.status(404);
    res.send('<h1>404 Not Found</h1>');
});


app.listen(port, () => {
    console.log(`App running at http://localhost:${port}`);
});
