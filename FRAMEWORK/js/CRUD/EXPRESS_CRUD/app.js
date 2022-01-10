// call requirement
const express           = require('express'),
      cors              = require('cors'),
      expressLayouts    = require('express-ejs-layouts')


const config = require('./lib/config/config');
const mongoose = require('mongoose');



mongoose.connect('mongodb://127.0.0.1:27017/ex_data', {
    useNewUrlParser: true,
    useUnifiedTopology: true,
}).then(() => {
    console.log('Connected to mongodb');
}).catch(err => {
    console.log(err);
});






// declare requirement
const port = 3000;
const app = express();



// use requirement after declare
app.set('view engine', 'ejs');
app.set('views', './src/views');
app.use(cors());
app.use(expressLayouts);
app.use(express.static('public'));



// routing handle 
app.get('/', (req, res) => {
    res.render('page/index', {
        layout: 'layouts/main-layout',
        title : 'Home',
    });
});


app.use('/', (req, res) => {
    res.status(404);
    res.send('<h1>404 Not Found</h1>');
});


app.listen(port, () => {
    console.log(`App running at http://localhost:${port}`);
});
