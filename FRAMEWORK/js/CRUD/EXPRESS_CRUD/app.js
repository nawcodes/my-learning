// call requirement
const express           = require('express'),
      cors              = require('cors'),
      expressLayouts    = require('express-ejs-layouts'),
      Data           = require('./src/model/ex_data')
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

app.post('/data', (req, res) => {
    Data.insertMany(req.body, (err, result) => {
        console.log(result, err);
    });
});


app.use('/', (req, res) => {
    res.status(404);
    res.send('<h1>404 Not Found</h1>');
});


app.listen(port, () => {
    console.log(`App running at http://localhost:${port}`);
});
