/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/index.blade.php",
    "./resources/views/components/layout.blade.php",
    "./resources/views/components/movie-card.blade.php",
    "./resources/views/components/alert-message.blade.php",
    "./resources/views/components/flash-message.blade.php",
    "./resouces/views/components/review-card.blade.php",
    "./resources/views/components/movie-tags.blade.php",
    "./resources/views/partials/_hero.blade.php",
    "./resources/views/lists/list.blade.php",
    "./resources/views/movies/create.blade.php",
    "./resources/views/movies/edit.blade.php",
    "./resources/views/movies/handle.blade.php",
    "./resources/views/movies/movie.blade.php",
    "./resources/views/reviews/write.blade.php",
    "./resources/views/users/account.blade.php",
    "./resources/views/users/login.blade.php",
    "./resources/views/users/manage.blade.php",
    "./resources/views/users/register.blade.php"
  ],
  theme: {
    extend: {
      screens: {
        sm: '480px',
        md: '768px',
        lg: '976px',
        xl: '1440px'
    },
    },
  },
  plugins: [],
}
