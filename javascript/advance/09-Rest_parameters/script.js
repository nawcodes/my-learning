// function myFunc(a, b , ...rest) {
//     // return `a = ${a}, b = ${b} , arg = ${rest}`;
//         //arguments to array
//         // return Array.from(arguments) 
//         // return [...arguments];
// }

// console.log(myFunc(1,2,34,5));


// function jumlahKan(...angka) {
//     // memakai forof
//     // let total = 0;
//     // for (const t of angka) {
//     //     total += t;
//     // }

//     // memakai reduce
//     // return angka.reduce((a,b) => a + b);



// }

// console.log(jumlahKan(1,2,3,4,5,6));

// const kelompok1 = ['rifal', 'nawi', 'shandi', 'cuk'];

// const [ketua, wakil, ...anggota] = kelompok1;

// console.log(ketua);
// console.log(anggota);

// const team = {
//     pm: 'shandika',
//     forentEnd1 : 'rifal',
//     forentEnd2 : 'herry',
//     backend    : 'nawi',
//     ux          : 'Hendra',
//     devOps      : 'Ferry'
// }


// const {pm, ...myTeam} = team;
// console.log(pm);
// console.log(myTeam);


// filter

function filterBy(type , ...values) {
    return values.filter(v => typeof v === type);
}

console.log(filterBy('boolean', 1,2, 'shandika', false, 18 , true, 'dody'));


