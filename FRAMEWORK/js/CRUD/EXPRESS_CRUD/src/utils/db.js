// import config from "./config/config";
const config  = require("../config/config")
const mongoose = require('mongoose');

// database handle
mongoose.connect(config.MONGODB_URL, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
}).then((result) => {
    console.log('Connected to mongodb');
}).catch(err => {
    console.log(err);
});


// Schema 
// const Exdata = mongoose.model('mahasiswa', {
//     'email' : {
//         type: String,
//     },
//     'nama' : {
//         type: String,
//     },
// }, 'mahasiswa' );



// const exData1 = new Exdata({
//     nama : 'haha',
//     email: 'haha@gmail.com',
// })


// exData1.save().then((result) => {
//     console.log(result);
// }).catch((err) => {
//     console.log(err);
// })