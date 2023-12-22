    /** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
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
                'card': '0 0 8px rgba(0, 0, 0, 0.1)',
                'container': '0 0 4px rgba(0, 0, 0, 0.1)'
            },
            colors: {
                'dark-green': '#00AA5B',
            },
            borderColor: ['focus'],
            outline: ['focus'],
        },
    },
    plugins: [
        // require('flowbite/plugin')
    ],
}
