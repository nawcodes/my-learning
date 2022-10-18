import { EventEmitter } from "events";

const eventEmitter = new EventEmitter();

eventEmitter.addListener("hello", (name) => {
    console.log(`Hello ${name}`);
});

eventEmitter.emit("hello", "John");