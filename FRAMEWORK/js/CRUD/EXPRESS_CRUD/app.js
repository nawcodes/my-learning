// call requirement
const express           = require('express'),
      cors              = require('cors'),
      expressLayouts    = require('express-ejs-layouts'),
      multer = require('multer'),
      path = require('path'),
      Data           = require('./src/model/ex_data'),
      {body, check, validationResult} = require('express-validator');
      
require('./src/utils/db');
// declare requirement
const port = 3000;
const app = express();

const diskStorage = multer.diskStorage({
    destination: (req, res, cb) => {
        cb(null, path.join(__dirname, '/uploads'));
    }, 
    filename: (req, file, cb) => {
        console.log(file);
        cb(null, `${file.fieldname} - ${Date.now() + path.extname(file.originalname)}`);
    }
})


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
 multer({storage: diskStorage}).single('image'),
 (req, res) => {
    const file = req.file.path;
    console.log(file);
    // const errors = validationResult(req);
    // if(!errors.isEmpty()) {
    //     // res.send(errors);
    //     console.log(errors);
    //     res.render('page/create-form', {
    //         title: 'Create form',
    //         layout: 'layouts/main-layout',
    //         errors : errors.array(),
    //         req : req.body,
    //     })
    // }else{
    //     const uuid =  String(Math.floor(Math.random() * Date.now())).substr(0,11);
    //     try {

    //         Data.insertMany({
    //         uuid: uuid,
    //         name: req.body.name,
    //         email: req.body.email,
    //         phone: req.body.phone,
            
    //         }, (err, result) => {
    //             if(err) {
    //                 console.log(err);
    //             }
    //             console.log(result);
    //         });

    //         return res.redirect('/');            
    //     } catch (error) {
    //         console.log(error);
    //         res.status(500).send({message: error.message});
    //     }
    
    //     return res.redirect('/')
    // }
    
});


app.use('/', (req, res) => {
    res.status(404);
    res.send('<h1>404 Not Found</h1>');
});


app.listen(port, () => {
    console.log(`App running at http://localhost:${port}`);
});
