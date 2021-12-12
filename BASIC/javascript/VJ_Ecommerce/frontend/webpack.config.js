const path = require('path');
const webpack  = require('webpack');




module.exports = {
    mode: 'development',
    entry: './src/index.js',
    output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'main.js',
    }, 
    devServer: {
        static: {
        directory: path.join(__dirname, 'dist'),
        },
        compress: true,
        port: 9000,
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