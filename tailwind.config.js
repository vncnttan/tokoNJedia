/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'mandala': ['Mandala', 'sans-serif']
            },
            textColor: {

            },
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
