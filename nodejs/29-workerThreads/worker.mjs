import {threadId, parentPort} from 'worker_threads';

parentPort.on('message', (message) => {
 
    for (let i = 0; i < message.message; i++) {
        console.log(`Thread ${threadId} is running ${i}`);
        parentPort.postMessage({threadId: threadId, message: i});
    }
    parentPort.close();
});