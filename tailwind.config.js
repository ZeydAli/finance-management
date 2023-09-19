/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            transitionProperty: {
                height: "height",
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                background: "#1F2427",
                component: "#262B2E",
                component2: "#313439",
                accent: "#E26F1E",
                expenses: "#EE4A49",
                income: "#0BBA7A",
                rootBlue: "#495FF9",
            },
        },
    },
    plugins: [
        require("tw-elements/dist/plugin.cjs"),
        require("flowbite/plugin"),
    ],
};
