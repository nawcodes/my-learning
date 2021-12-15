import homeScreen from './srcreens/HomeScreen.js';
import ProductScreen from './srcreens/ProductScreen.js';
import Error404Screen from './srcreens/Error404Screen.js';
import { hideLoading, parseRequestUrl, showLoading } from './utils.js';
import CartScreen from './srcreens/CartScreen.js';
import SigninScreen from './srcreens/SigninScreen.js';
import Header from './component/Header.js';




const routes = {
    '/': homeScreen,
    '/product/:id' : ProductScreen,
    '/cart/:id' : CartScreen,
    '/cart' : CartScreen, 
    '/signin' : SigninScreen,
}

const router = async () => {
    showLoading();
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
    await screen.after_render();
    hideLoading();
}

window.addEventListener('load', router);
window.addEventListener('hashchange', router);