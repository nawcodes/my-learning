"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.default = void 0;

const dotenv = require('dotenv');

dotenv.config(); // console.log(process.env.MONGODB_URL);

var _default = {
  MONGODB_URL: process.env.MONGODB_URL
};
exports.default = _default;