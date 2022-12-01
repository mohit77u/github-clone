/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'dark-primary' : '#0d1117',
        'green-primary' : '#238636',
      }
    },
  },
  plugins: [],
}
