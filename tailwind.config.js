import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import nesting from 'tailwindcss/nesting';

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
            animation: {
                'blur-in': 'blur-in 0.4s linear both',
            },
            keyframes: {
                'blur-in': {
                    '0%': { filter: 'blur(12px);opacity:0' },
                    '100%': { filter: 'blur(0);opacity:1' }
                },

            }
        },
    },

    plugins: [forms, typography, require("tw-elements/dist/plugin.cjs"), nesting],
    darkMode: "class",
};
