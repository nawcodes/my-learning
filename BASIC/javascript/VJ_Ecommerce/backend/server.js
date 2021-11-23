const express = require('express');
const data = require('./data.js');
const port = 3000;
const app = express();

app.get("/api/products", (req, res) => {
    res.send(data.products);
});

app.listen(port, () => {
    console.log(`Serve at http://localhost:${port}`);
});