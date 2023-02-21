/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/views/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/tailwind.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["winter"],
    },
};
