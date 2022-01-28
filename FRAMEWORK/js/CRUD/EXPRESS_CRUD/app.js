// call requirement

const express           = require('express'),
      fs =  require('fs'),
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
        cb(null, path.join(__dirname, '/public/assets/img'));
    }, 
    filename: (req, file, cb) => {
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
 multer({storage: diskStorage}).single('image'),
 [
     check('image').custom((value, {req}) => {
             if(typeof req.file != 'undefined') {
                 const extension = (path.extname(req.file.originalname)).toLowerCase();
                 console.log(extension.length);
                 const validExtesion = [
                     '.jpg', '.jpeg', '.png'
                 ]
                 const checkExt = validExtesion.find((ext) => ext === extension);
                 if(checkExt !== extension ) {
                    fs.unlink(req.file.path, (err) => {
                     if(err) {
                         console.log(err);
                     }
                    });
                    throw new Error('an image must be right image');
                 }
             }
             return true;
      }),
    body('name', 'Field Full Name is required').exists({checkFalsy: true}),
    check('email', 'Email must be valid email').isEmail(),
    body('phone', 'Field Phone is Required & must be ID format').isMobilePhone('id-ID'),
 ],
 (req, res) => {  
    const errors = validationResult(req);
    if(!errors.isEmpty()) {
        // res.send(errors);
        console.log(errors);
        res.render('page/create-form', {
            title: 'Create form',
            layout: 'layouts/main-layout',
            errors : errors.array(),
            req : req.body,
        })
    }else{
        const uuid =  String(Math.floor(Math.random() * Date.now())).substr(0,11);
        try {

            Data.insertMany({
            uuid: uuid,
            name: req.body.name,
            email: req.body.email,
            phone: req.body.phone,
            image: typeof req.file == 'undefined' ? 'default.png' : req.file.filename,
            
            }, (err, result) => {
                if(err) {
                    console.log(err);
                }
                console.log(result);
            });
            console.log(`Insert data are success`);
            return res.redirect('/');            
        } catch (error) {
            console.log(error);
            res.status(500).send({message: error.message});
        }
    
        return res.redirect('/')
    }
    
});


app.use('/', (req, res) => {
    res.status(404);
    res.send('<h1>404 Not Found</h1>');
});


app.listen(port, () => {
    console.log(`App running at http://localhost:${port}`);
});
