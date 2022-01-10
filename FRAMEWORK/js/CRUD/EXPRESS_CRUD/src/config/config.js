const dotenv = require('dotenv');

dotenv.config();

// console.log(process.env.MONGODB_URL);

export default {
    MONGODB_URL : process.env.MONGODB_URL,
}