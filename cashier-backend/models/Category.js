import mongoose from "mongoose";

const Schema = mongoose.Schema({
    title: {
        type: String,
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

export default mongoose.model("category", Schema);