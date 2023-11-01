/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            boxShadow: {
                'box': '0 0 15px rgba(0, 0, 0, 0.25)',
            },
            colors: {
                'dark-green': '#00AA5B',
            },
            borderColor: ['focus'],
            outline: ['focus'],
        },
    },
    plugins: [],
}