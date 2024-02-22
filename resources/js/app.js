import './bootstrap';

import { createApp } from 'vue';
import Cart from './components/products/cart.vue';

const app = createApp({});
app.component('Cart', Cart);
app.mount("#app");
