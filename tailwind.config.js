import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import colors from "tailwindcss/colors.js";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        // './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],

    // typography: (theme) => ({
    //     dark: {
    //         css: {
    //             h1: {
    //                 color: theme('colors.white'),
    //                 fontWeight: 800,
    //                 fontSize: '2.25em',
    //                 marginTop: 0,
    //                 marginBottom: '0.8em',
    //                 lineHeight: 1.1,
    //                 test: colors
    //             },
    //         },
    //     },
    // }),

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
