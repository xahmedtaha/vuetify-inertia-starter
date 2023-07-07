import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    // prefix: 'tw-',

    important: true,

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'El Messiri', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    // plugins: [forms],

    corePlugins: {
        preflight: false,
    }
};
