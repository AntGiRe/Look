/** @type {import('tailwindcss').Config} */
export default {
  mode: "jit",
  content: [
    "resources/**/*.blade.php",
    "resources/**/*.js",
    "vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

