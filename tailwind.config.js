/** @type {import('tailwindcss').Config} */
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
        },
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
};
