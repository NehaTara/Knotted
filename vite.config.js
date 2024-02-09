import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import pkg from 'vite-plugin-tailwind';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            plugins: [
                pkg.vitePlugin, // Use the vitePlugin property from the default export
            ],
            refresh: true,
        }),
    ],
});