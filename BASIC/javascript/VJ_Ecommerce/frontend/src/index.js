import homeScreen from './srcreens/HomeScreen.js';
import ProductScreen from './srcreens/ProductScreen.js';
import Error404Screen from './srcreens/Error404Screen.js';
import { hideLoading, parseRequestUrl, showLoading } from './utils.js';
import CartScreen from './srcreens/CartScreen.js';
import SigninScreen from './srcreens/SigninScreen.js';
import Header from './component/Header.js';
import RegisterScreen from './srcreens/RegisterScreen.js';
import ProfileScreen from './srcreens/ProfileScreen.js';
import ShippingScreen from './srcreens/ShippingScreen.js';
import PaymentScreen from './srcreens/PaymentScreen.js';
import placeOrderScreen from './srcreens/PlaceOrderScreen.js';




const routes = {
    '/': homeScreen,
    '/product/:id' : ProductScreen,
    '/cart/:id' : CartScreen,
    '/cart' : CartScreen, 
    '/signin' : SigninScreen,
    '/register' : RegisterScreen,
    '/profile' : ProfileScreen,
    '/shipping' : ShippingScreen,
    '/payment' : PaymentScreen,
    '/placeorder' : placeOrderScreen,
}

const router = async () => {
    // showLoading();
    const request = parseRequestUrl();
    
    const parseUrl = 
    (request.resource ? `/${request.resource}` : '/') +
    (request.id ? `/:id` : '') + 
    (request.verb ? `/${request.verb}` : '');
    const screen = routes[parseUrl] ? routes[parseUrl] : Error404Screen;
    const header = document.getElementById('header-container');
    header.innerHTML = await Header.render();
    await Header.after_render();
    const main = document.getElementById('main-container');
    main.innerHTML = await screen.render();
    if(screen.after_render()) await screen.after_render(); 
    // hideLoading();
}

window.addEventListener('load', router);
window.addEventListener('hashchange', router);