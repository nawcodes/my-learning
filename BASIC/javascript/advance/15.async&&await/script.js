// implement syncronous

    // declare be promise
// const coba = new Promise((resolve) => {
//     setTimeout(() => {
//     resolve('selesai')
//     }, 2000);
// });

// console.log(coba); pending
// coba.then((coba) => console.log(coba));



// menggunakan async await
function cobaPromise() {
    const time = 5000;
    return new Promise((resolve, reject) => {
        if(time < 5000) {
            setTimeout(() => {
            resolve('selesai')
            }, time);
        }else{
            reject('kelamaan!')
        }        
    });
    
};

// cara ini tidak tepat untuk menggunakan async await mesikipun hasilnya resolve
// const callPromise = cobaPromise();
// callPromise.then((callPromise) => console.log(callPromise))
//             .catch((callPromise) => console.log(callPromise));

async function cobaAsync() {
    // error handling
    try {
        const coba = await cobaPromise();
        console.log(coba);
    } catch (error) {
        console.log('gagal');
    }
    
}

cobaAsync();




