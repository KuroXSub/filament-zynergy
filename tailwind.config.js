/** @type {import('tailwindcss').Config} */
import colors from 'tailwindcss/colors' 
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography' 

module.exports = {
  content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',],
  theme: {
    extend: {
      colors: { 
        danger: colors.rose,
        primary: colors.blue,
        success: colors.green,
        warning: colors.yellow,
    }, 
    },
  },
  plugins: [],
}

