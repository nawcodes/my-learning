// tag templates
// const nama = 'Rifal Nurjamil';
// const umur = 33;
// const email = 'rifalnurchya@gmail.com'




// const str = coba`Hallo Nama Saya ${nama}, dan umur saya ${umur} tahun dan email saya ${email} `;

// ubah menjadi tag templates
// param permata adalah string str yang menjadi array yang di pisahkan setiap index nnya oleh expression
// param kedua yaitu values dari expression nya . bisa di tulis secara manual sesuai berapa banyak expressionnya , tapi lebih baik di tulis ...values agar menampung semau expresssionnya. tinggal forEach

// cara old
// function coba(strings, ...values) {
//     let result = '';
//     // looping map membuat array baru
//     strings.forEach((str, index) => {
//         console.log(`${str}${values[index] || ''}`);       
//     });
// }

// cara modern
// reduce , menggabungkan isi dari array
// function coba(strings , ...values) {
//     // resutl yang akan menggabungkan seluruh isi arraynya
//     // str = element yang ada di dalam string
//     // i = index 
//     return strings.reduce((result, str, i) => `${result}${str}${values[i] || ''}`, '' )
// } 

// console.log(str);


// implementasi real highlight
// mencari nama dengan nama background highlight

// function coba(strings, ...values) {
//     return strings.reduce((result, str , i) => `${result}${str}<span class="hl">${values[i] || ''}</span>`, '');
// }

// document.body.innerHTML = str;
// console.log(str);


// penggunaan lain

// Esxcaping HTML Tags

// function sanitize(strings , ...values) {
        // ini library lain , pasti akan muncul error karena lib nya gak ada.
        // codeburst.io/javascript-es6-tagged-tamplates-literals-a45c26e54761
//     return DOMPurify.sanitize(aboutMe);
// }

// const nama = 'rifal nurjamil';
// const aboutMe = `I love coding <img src="http:/unsplash.it/100/100?random" onload="alert('I Love You :*');" />`

// const html = sanitize`<h3>${nama}</h3>
// <p class="about">${aboutMe}</p>`;


// Trabslatiin & Internationalization / alih bahasa

// const name = 'rifal nurjamil';
// const amount = '12000';

// // ini juga library
// // github/skolmer/es2015-i18n-tag
// const html = i18n`Hello ${name}, you have ${amout} in your bank account.`;


// styled Components
// styled-components.com/docs/basics#getting-started
// const Title = styled.h1`
// font-size: 1.5em;
// text-aligh:center;
// color:black;`;










