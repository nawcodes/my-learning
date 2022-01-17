const mongoose = require('mongoose');


const Person = mongoose.model('Person', {
    uuid: {
        type: String,
        required: true,
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
        required: false,
    }, 
})


module.exports = Person;