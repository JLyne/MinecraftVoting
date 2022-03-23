import { defineConfig } from 'vite'
import laravel from 'vite-plugin-laravel'

export default ({mode}) => {
    return defineConfig({
        server: {
            host: '0.0.0.0'
        },
        plugins: [
            laravel(mode === 'production' ? {
                config: 'vite.config.json',
            } : undefined)
        ]
    });
};
