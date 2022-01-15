const dotenv = require('dotenv');

dotenv.config();

// console.log(process.env.MONGODB_URL);

module.exports =  {
    MONGODB_URL : process.env.MONGODB_URL,
}