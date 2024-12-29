/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php", // Include all Blade templates
      "./resources/**/*.js",        // Include any JavaScript files
      "./resources/**/*.vue",       // Include any Vue components
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  };
  