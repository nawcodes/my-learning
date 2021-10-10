const validator = require('validator');


// console.log( validator.isEmail('rifal@gmail.com'));

// console.log( validator.isMobilePhone('0812313141', 'id-ID'));

// console.log( validator.isNumeric('0812313141'));

const chalk = require('chalk');

console.log( chalk.blue('Hello World'));

pesan = chalk`Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
"There is no one who loves pain itself, who seeks after it and {bgRed wants to have it, simply because its  is pain}..`;

console.log(pesan);
