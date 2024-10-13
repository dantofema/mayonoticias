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
        require("@tailwindcss/line-clamp"),
        require("daisyui")
    ],
    daisyui: {
        themes: [
            // {
            //     "mayo-theme": {
            //         "primary": "#FF0000",
            //         "secondary": "#FF0000",
            //         "accent": "#FF0000",
            //         "neutral": "#FF0000",
            //         "base-100": "#FF0000",
            //         "base-200": "#FF0000",
            //         "base-300": "#FF0000",
            //     },
            // },
            "light",
            "dark",
            "cupcake",
            "winter"
        ],
    },
}

