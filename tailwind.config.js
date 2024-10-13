/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            spacing: {
                '128': '32rem',
            }
        },
    },
    plugins: [
        require("@tailwindcss/typography"),
        require("daisyui")
    ],
    daisyui: {
        themes: ["light", "dark", "cupcake"],
    },
}

