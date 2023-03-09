import mongoose from "mongoose";

const Schema = mongoose.Schema({
    title: {
        type: String,
    },
    price: {
        type: Number,
    },
    thumbnail: {
        type: String,
    },
    categoryId: {
        type: mongoose.Schema.Types.ObjectId,
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

Schema.virtual('categories', {
    ref: 'category',
    localField: 'categoryId',
    foreignField: '_id',
})

export default mongoose.model("product", Schema);