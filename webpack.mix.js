const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

// mix.styles([
//     'educavo/assets/css/bootstrap.min.css',
//     'educavo/assets/css/font-awesome.min.css',
//     'educavo/assets/css/animate.css',
//     'educavo/assets/css/owl.carousel.css',
//     'educavo/assets/css/slick.css',
//     'educavo/assets/css/off-canvas.css',
//     'educavo/assets/fonts/linea-fonts.css',
//     'educavo/assets/fonts/flaticon.css',
//     'educavo/assets/css/magnific-popup.css',
//     'educavo/assets/css/rsmenu-main.css',
//     'educavo/assets/css/rs-spacing.css',
//     'educavo/style.css',
//     'educavo/assets/css/responsive.css'
// ],
//     'public/css/hasil_combine.css').version();
