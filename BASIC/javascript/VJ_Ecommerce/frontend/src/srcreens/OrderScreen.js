import { getOrder } from "../api";
import {parseRequestUrl} from "../utils";

const placeOrderScreen = {

    after_render:  async () => {
    
    },
    render: async () => {
        const request = parseRequestUrl();
        const {
            _id,
            shipping,
            payment,
            orderItems,
            itemsPrice,
            shippingPrice,
            taxPrice,
            totalPrice,
            deliveredAt,
            isDelivered,
            isPaid,
            paidAt
        } = await getOrder(request.id);

        return `
            <div>
            <h1> Order ${_id}</h1>
                <div class="order">
                    <div class="order-info">
                        <div>
                            <h2>Shipping</h2>
                            <div>
                                ${shipping.address}, ${shipping.city}, ${shipping.postalCode},
                                ${shipping.country}
                            </div>
                            ${isDelivered ? `<div class="success">Delivered ${deliveredAt}</div>`
                                          : `<div class="success">Not Delivered</div>`}
                        </div>
                        <div>
                            <h2>Payment</h2>
                            <div>
                                Payment Method: ${payment.paymentMethod}
                            </div>
                             ${isPaid ? `<div class="success">Paid At ${paidAt}</div>`
                                          : `<div class="success">Not Paided</div>`}
                        </div>
                        <div>
                            <ul class="cart-list-container">
                                <h2>Shopping Cart</h2>
                                <div>Price</div>
                            ${
                                orderItems.map(item => `
                                    <li>
                                        <div class="cart-image">
                                            <img src="${item.image}"  alt="${item.name}"/>
                                        </div>
                                        <div class="cart-item">
                                            <div>
                                                <a href="/#/product/${item.product}">${item.name}</a>
                                            </div>
                                            <div>
                                                Qty: ${item.qty}
                                            </div>
                                        </div>
                                        <div class="cart-price">
                                            $${item.price}
                                        </div>
                                    </li>
                                `)
                            }
                            </ul>
                        </div>
                    </div>
                    <div class="order-action">
                        <ul>
                            <li>
                                <h2>Order Summary</h2>
                            </li>
                            <li>
                                <div>
                                    Items
                                </div>
                                <div>
                                    $${itemsPrice}
                                </div>
                            </li>
                            <li>
                                <div>
                                    Shipping
                                </div>
                                <div>
                                    $${shippingPrice}
                                </div>
                            </li>
                            <li>
                                <div>
                                    Tax
                                </div>
                                <div>
                                    $${taxPrice}
                                </div>
                            </li>
                            <li class="total">
                                <div>
                                    Order Total
                                </div>
                                <div>
                                    $${totalPrice}
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        `
    } 
}

export default placeOrderScreen;