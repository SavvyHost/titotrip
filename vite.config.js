import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import manifestSRI from 'vite-plugin-manifest-sri';


export default defineConfig({
    plugins: [
        laravel({
            input:'resources/js/app.js',
            ssr: 'resources/js/ssr.js',

            refresh: true,
        }),
        manifestSRI(),
    ],
});
