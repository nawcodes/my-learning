import mongoose from "mongoose";

const Schema = mongoose.Schema({
    fullname: {
        type: String,
    },
    email: {
        type: String,
    },
    password: {
        type: String,
    },
    role: {
        type: String,
        enum: ["admin", "cashier", "employee"],
        default: "employee",
    },
    status: {
        type: String,
        enum: ["active", "inactive"],
        default: "active",
    },
    created_at: {
        type: Number,
    },
    updated_at: {
        type: Number,
    },
}, {
    timestamps: { currentTime: () => Math.floor(Date.now() / 1000) },
})

export default mongoose.model("user", Schema);