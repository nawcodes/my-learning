// example basic promise with common function
// ini menggunakan async javascript biasa
function samplePromise() {
    return Promise.resolve("Hello Fall");
}

async function runPromise() {
    const result = await samplePromise();
    console.log(result);
}

runPromise();

