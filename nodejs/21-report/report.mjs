// https://nodejs.org/docs/latest-v16.x/api/report.html

// A report can also be triggered via an API call from a JavaScript application:

import process from 'process';

process.report.reportOnFatalError = true;
process.report.reportOnSignal = true; 
process.report.reportOnUncaughtException = true;
process.report.filename = "report.json";

function sampleError() {
    throw new Error('Sample Error');
}

sampleError();