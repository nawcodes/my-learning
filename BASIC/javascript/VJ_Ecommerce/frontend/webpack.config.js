const path = require('path');
const webpack  = require('webpack');




module.exports = {
    mode: 'development',
    entry: './src/index.js',
    output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'main.js',
    }, 
    resolve: {
        fallback: {
            "fs": false,
            'stream' : false,
            'path' : false,
            'http' : false,
            'crypto' : false,
        },
        
    },
}