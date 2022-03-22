import { defineConfig } from 'vite';
import laravel from 'vite-plugin-laravel';

export default defineConfig({
    server: {
        host: '0.0.0.0'
    },
	plugins: [
		laravel(),
	]
});
