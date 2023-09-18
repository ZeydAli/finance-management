/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js",
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
                accent: "#252130",
                expenses: "#EE4A49",
                income: "#0BBA7A",
            },
        },
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
};
