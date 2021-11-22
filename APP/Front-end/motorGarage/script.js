const radio = document.getElementById('radio1');
const slideFirst = document.querySelector('.first');

radio.addEventListener('click', (e) => {
    slideFirst.style.marginLeft = '-20%';
});