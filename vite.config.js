import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import mkcert from 'vite-plugin-mkcert'
import fs from 'fs';

export default defineConfig({
    server: {
        
        host: 'breezecom2.test',
        https: {
            key: fs.readFileSync('breezecom2.test.key'),
            cert: fs.readFileSync('breezecom2.test.crt'),
          },
        // '0.0.0.0'
    },
    plugins: [
        mkcert(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            detectTls: 'breezecom2.test', 
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});