const mongoose = require('mongoose');
mongoose.connect('mongodb://127.0.0.1:27017/ex_data', {
    useNewUrlParser: true,
    useUnifiedTopology: true,
});

// // Schema
// const Contact = mongoose.model('Contact', {
//     nama: {
//         type: String,
//         required: true,
//     },
//     nohp: {
//         type: String,
//         required: true,
//     }, 
//     email: {
//         type: String,
//     }
// });

// // add data
// const contact1  = new Contact({
//     nama: 'zheyenk',
//     nohp: '08414131241',
//     email: 'zheyenk@gmail.com'
// });

// // save
// contact1.save().then((result) => {
//     console.log(result);
// })  