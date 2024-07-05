/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: theme => ({
        'custom-bg': "url('public/images/background.jpg')",
      }),
    },
  },
  plugins: [],
}
