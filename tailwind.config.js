/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
      './storage/framework/views/*.php',
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
      extend: {},
    },
    plugins: [
      require("./plugin"),
      require('tailwindcss-animated')
    ],
  }
  