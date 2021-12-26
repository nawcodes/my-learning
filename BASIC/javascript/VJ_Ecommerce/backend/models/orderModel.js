import mongoose from 'mongoose';

const orderSchema = new mongoose.Schema(
    {
        orderItems: [
            {
                name: {type: 'string', required: true},
                image: {type: 'string', required: true},
                price: {type: 'string', required: true},
                qty: {type: 'string', required: true},
                product: {
                    type: mongoose.Schema.Types.ObjectId,
                    ref: 'product',
                    required: true,
                },
            }
        ],
        user: { type: mongoose.Schema.Types.ObjectId, ref: 'User', required: true},
        shipping: {
            address: String,
            city: String,
            postalCode: String,
            country: String,
        },
        payment: {
            paymentMethod: String,
            paymentResult: {
                orderID: String,
                payerID: String,
                paymentID: String,
            },
        },
        itemsPrice: Number,
        taxPrice: Number,
        shippingPrice: Number,
        totalPrice: Number,
        isPaid: {type: Boolean, required: true, default: false},
        paidAt: Date,
        isDelivered: {type: Boolean, required: true, default: false},
        deliveredAt: Date,
    },
    {
        timestamp: true,
    }
);

const Order = mongoose.model('Order', orderSchema);
export default Order;