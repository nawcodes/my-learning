import CheckoutSteps from "../component/CheckoutSteps";
import { getUserInfo,  getShipping, setShipping } from "../localStorage";

const ShippingScreen = {
    after_render: () => {
        document
        .getElementById('shipping-form')
        .addEventListener('submit', async (e) => {
            e.preventDefault();
            setShipping({
                address: document.getElementById('address').value,
                city: document.getElementById('city').value,
                postalCode: document.getElementById('postalcode').value,
                country: document.getElementById('country').value,
            });
            document.location.hash = '/payment';
        });     
    },
    render: () => {
        const {name} = getUserInfo();
        if(!name) {
            document.location.hash = '/';
        }
        const {address, city, postalCode, country} = getShipping();

        return `
        ${CheckoutSteps.render({step1: true, step2: true})}
        <div class="form-container">
            <form id="shipping-form">
                <ul class="form-items">
                    <li>
                        <h1>Shipping</h1>
                    </li>
                    <li>
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="${address}"/>
                    </li>
                    <li>
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="${city}"/>
                    </li>
                    <li>
                        <label for="postalcode">Postal Code</label>
                        <input type="text" id="postalcode" name="postalcode" value="${postalCode}"/>
                    </li>
                    <li>
                        <label for="country">country</label>
                        <input type="text" id="country" name="country" value="${country}"/>
                    </li>
                   
                    <li><button class="primary" type="submit">Continue</button></li>
                </ul>
            </form>

        </div>
        `;
    }
};

export default ShippingScreen;
