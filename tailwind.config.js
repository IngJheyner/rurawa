import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                'primary-color': {
                    DEFAULT: 'var(--primary-color)',
                    500: 'var(--primary-color-500)',
                },
                'secondary-color': 'var(--secondary-color)',
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography, require("tw-elements/dist/plugin.cjs")],
    darkMode: "class",
};