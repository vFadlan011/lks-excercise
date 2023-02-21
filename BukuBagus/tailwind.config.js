/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/views/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["winter"],
    },
};
