// Secara default async di js modules adalah global async, jadi bisa menggunakan await di luar function


function samplePromise() {
    return Promise.resolve("Hello Fall");
}

const result = await samplePromise();
console.log(result);


