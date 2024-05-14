import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    plugins: [
        vue(), 
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
           
            postcssPlugins: [
                require('tailwindcss'),
            ],
            ssr: 'resources/js/ssr.js',
            refresh: true,
		// add this
            detectTls: 'breezecom',
        }),
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
    },
});
