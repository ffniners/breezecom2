import { createApp } from 'vue';
import Home from './Pages/Home.vue';
import Product from './Pages/Product.vue'; 
import Cart from './Pages/Cart.vue';
import './bootstrap';
import '../css/app.css'

createApp({

    components: {
        Home,
        Product,
        Cart,
    },
}).mount('#app');



















/*
import './bootstrap';
import '../css/app.css';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
//import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

//InertiaProgress.init({ color: '#4B5563' });
*/