import {threadId, Worker} from 'worker_threads';

const worker1 = new Worker('./worker.mjs');
const worker2 = new Worker('./worker.mjs');

worker1.on("message", (message) => {
    console.log(`Received message from worker ${message.threadId}: ${message.message}`);
});

// send message to worker
worker1.postMessage({threadId: threadId, message: 10});
