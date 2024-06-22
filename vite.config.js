import { defineConfig } from 'vite'
import path from 'path';

export default defineConfig({
    base: "./",
    optimizeDeps: {
        include: ['/_src/**/*.{css,scss,js}'],
    },
    resolve: {
        alias: {
            '@': '/public',
        }
    },
    build: {
        outDir: path.resolve('_dist/'),
        emptyOutDir: true,
        copyPublicDir: false,
        rollupOptions: {
            input: '/_src/js/app.js',
            output: {
                assetFileNames: ({ name }) => {
                    if (/\.css$/.test(name ?? "")) {
                        return "css/[name][extname]";
                    }

                    return "[name][extname]";
                },
                entryFileNames: "js/[name].js",
            },
        },
    },
    server: {
        strictPort: true,
    }
})