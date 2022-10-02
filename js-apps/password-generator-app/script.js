const pwEl = document.getElementById('pw');
const lengthEl = document.getElementById('length');
const copyEl = document.getElementById('copy');
const upperEl = document.getElementById('upper');
const lowerEl = document.getElementById('lower');
const numberEl = document.getElementById('number');
const symbolEl = document.getElementById('symbol');
const generateEl = document.getElementById('generate');


const lowerLetters = 'abcdefghijklmnopqrstuvwxyz';
const upperLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
const numbers = '0123456789';
const symbols = '!@#$%^&*()_+=';



function getLowerCase() {
    return lowerLetters[Math.floor(Math.random() * lowerLetters.length)];
}

function getUpperCase() {
    return upperLetters[Math.floor(Math.random() * upperLetters.length)];
}

function getNumber() {
    return numbers[Math.floor(Math.random() * numbers.length)];
}

function getSymbol() {
    return symbols[Math.floor(Math.random() * symbols.length)];
}


function generatePassword() {
    const lengthPassword = lengthEl.value;
    let password = '';


    if(upperEl.checked) {
        password += getUpperCase();
    }
    if(lowerEl.checked) {
        password += getLowerCase();
    }
    if(numberEl.checked) {
        password += getNumber();
    }
    if(symbolEl.checked) {
        password += getSymbol();
    }

    console.log(password.length);


    for (let i = password.length ; i < lengthPassword; i++) {
        const x = generateX();
        password += x;        
    }

    pwEl.innerText = password;
    
}

function generateX() {
    const array = [];

    if(upperEl.checked) {
        array.push(getUpperCase());
    }
    if(lowerEl.checked) {
        array.push(getLowerCase());
    }
    if(numberEl.checked) {
        array.push(getNumber());
    }
    if(symbolEl.checked) {
        array.push(getSymbol());
    }

    if(array.length === 0) {
        return "";
    }

    return array[Math.floor(Math.random() * array.length)];

}

generateEl.addEventListener('click', generatePassword);

copyEl.addEventListener('click', () => {
    const textarea = document.createElement('textarea');

    const password = pwEl.innerText;

    if(!password) { return; }

    textarea.value = password;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    textarea.remove();
    alert('password copied to clipboard');
});

