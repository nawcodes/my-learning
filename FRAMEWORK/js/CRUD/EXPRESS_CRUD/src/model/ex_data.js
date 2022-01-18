const mongoose = require('mongoose');

const Person = mongoose.model('Person', {
    uuid: {
        type: String,
    },
    name: {
        type: String,
        required: true,
    }, 
    email: {
        type: String,
        required: true,
    }, 
    phone: {
        type: String,
        required: true,
    },
    image: {
        type: String,
    }, 
});


module.exports = Person;