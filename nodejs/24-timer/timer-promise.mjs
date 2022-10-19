import timers from 'timers/promises';

// await timers.setTimeout(5000);

// console.log(`Start time at ${new Date()}`);

for await (const startTime of timers.setInterval(1000, 'ignored')) {
    console.log(`Start time at ${new Date()}`);
}