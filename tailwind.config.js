/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        'custom-blue-light': '#6C88D5',
        'custom-blue-dark': '#283252',
        'custom-gray': '#DEDEDE',
        'brand-primary': '#4A6DCB',
        'custom-purple': 'rgba(100, 52, 147, 0.76)',
        'custom-blue': 'rgba(74, 109, 203, 0.8)',
        'custom-lightblue': 'rgba(100, 210, 247, 0.78)',
      },
      backgroundImage: {
        'elevate-gradient': 'radial-gradient(circle at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%)',
        'pattern': "url('/assets/img/bg-pattern.svg')",
      },
      gradientColorStops: theme => ({
        'gradient-start': theme('colors.custom-purple'),
        'gradient-middle': theme('colors.custom-blue'),
        'gradient-end': theme('colors.custom-lightblue'),
      }),
      animation: {
        'fade-tooltip': 'fadeTooltip 500ms cubic-bezier(0.44, 0.81, 0.98, 0.99)',
      },
      keyframes: {
        fadeTooltip: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
      },
    },
  },
  plugins: [],
}
