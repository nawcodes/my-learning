const express = require('express');
const cors = require('cors');
const data = require('./data.js');
const port = 3000;
const app = express();


app.use(cors());
app.get("/api/products", (req, res) => {
    res.send(data.products);
});

app.listen(port, () => {
    console.log(`Serve at http://localhost:${port}`);
});

