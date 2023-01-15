import express from 'express';
import logger from 'morgan';
import dotenv from 'dotenv';
import mongoose from 'mongoose';
import cors from 'cors';

import indexRouter from './routes/index.js';

const app = express();
const env = dotenv.config().parsed;

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cors(
  {
    origin: '*',
  }
));

mongoose.connect(`${env.MONGODB_URI}${env.MONGODB_HOST}:${env.MONGODB_PORT}`, {
  dbName: env.MONGODB_DB,
});
mongoose.set('strictQuery', true);

const db = mongoose.connection;
db.on('error', console.error.bind(console, 'connection error:'));
db.once('open', () => {
  console.log('Connected to MongoDB');
});
  
app.use('/', indexRouter);


app.listen(env.APP_PORT, () => {
  console.log(`Example app listening on port ${env.APP_PORT}!`);
});