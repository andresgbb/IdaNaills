import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/home.css',
                'resources/css/confirmacion.css',
                'resources/css/admin.css',
                'resources/css/reservas.css',
            ],
            refresh: true,
        }),
    ],
});
