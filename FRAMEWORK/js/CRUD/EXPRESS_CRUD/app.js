// call requirement
const express           = require('express'),
      cors              = require('cors'),
      expressLayouts    = require('express-ejs-layouts'),
      mongoose = require('mongoose')

import config from './src/config/config';


// declare requirement
const port = 3000;
const app = express();




// use requirement after declare
app.set('view engine', 'ejs');
app.set('views', './src/views');
app.use(cors());
app.use(expressLayouts);
app.use(express.static('public'));

// database handle
mongoose.connect(config.MONGODB_URL, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
}).then((result) => {
    console.log('Connected to mongodb');
}).catch(err => {
    console.log(err);
});


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
