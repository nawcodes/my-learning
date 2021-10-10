// HTML FRAGMENTS
// const mhs = {
//     nama: 'rifal',
//     umur: 33,
//     nim : 20180050049,
//     personalEmail: 'rifalnurchya@gmail.com',
//     universityEmail: 'rifal.nurjamil_si18@nusaputra.ac.id'
    
// }

// const element = `<div class="mhs">
//     <h2>${mhs.nama}</h2>
//     <span class="nrp">${mhs.nim}</span>
// </div>`;

// console.log(element);

// simpan di DOM untuk di tampilkan di HTML

// document.body.innerHTML = element;


// menggunakan looping

// const mhs = [ {
//     nama: 'rifal',
//     umur: 33,
//     nim : 20180050049,
//     personalEmail: 'rifalnurchya@gmail.com',
//     universityEmail: 'rifal.nurjamil_si18@nusaputra.ac.id'
// },
// {
//     nama: 'shandika',
//     umur: 22,
//     nim : 20180050012,
//     personalEmail: 'shandika@gmail.com',
//     universityEmail: 'shandika_si18@nusaputra.ac.id'
// },
// {
//     nama: 'erik',
//     umur: 10,
//     nim : 20180050010,
//     personalEmail: 'erik@gmail.com',
//     universityEmail: 'erik@nusaputra.ac.id'
// }
// ];

// const el = `<div class="mhs">
//     ${mhs.map(m => `<ul class="parent-list">
//         <li class="list">${m.nama}</li>
//         <li class="list">${m.personalEmail}</li>
//     </ul>`).join('')}
// </div>`

// document.body.innerHTML = el;

// menggunakan pengkondisian
// ternary

// const lagu = {
//     judul: 'I Was King',
//     penyanyi: 'One Oke Rock',
//     // hapus feat jika ingin jalan
//     feat : 'MFS' 
// }

// const el = `<div class="lagu">
//     <ul class="parent-list">
//         <li>
//             ${lagu.judul}
//         </li>
//         <li>
//             ${lagu.penyanyi}  ${lagu.feat ? `(feat: ${lagu.feat})` : ''}
//         </li>
        
//     </ul>
// </div>`;

// document.body.innerHTML = el;

// HTML FRAGMENT BERSARANG
// nested


// const mhs = {
//     nama: 'rifal',
//     semester : 5,
//     matakuliah : [
//         'web',
//         'analisis',
//         'sistem informasi',
//         'pemrograman'
//     ]
// };

// function cetakMataKuliah(matkul) {
//     return `<ol class="parent-matkul">
//         ${matkul.map(mk => `<li class="matkul">${mk}</li>`).join('')}
//     </ol>`
// }

// const el = `<div class="mhs">
//     <h2>${mhs.nama}</h2>
//     <span class="smt">Semester ${mhs.semester}</span>
//     <h4>Mata Kuliah</h4>
//     ${cetakMataKuliah(mhs.matakuliah)}
// </div>`


// document.body.innerHTML = el;


const mhs = {
    nama    : 'rifal',
    smt     : 5 ,
    matkul  : [
        'web',
        'pemrograman',
        'analisis',
        'sistem informasi dan sesuatu'
    ]
};

const el = `<div class="mhs">
    <h2>Nama ${mhs.nama}</h2>
    <small class="sm">Semester ${mhs.smt}</small>
    <ol class="list-matkul">
    ${mhs.matkul.map(matkul => `<li class="matkul">${matkul}</li>`).join('')}
    </ol>
</div> `;

console.log(el);

document.body.innerHTML = el;



