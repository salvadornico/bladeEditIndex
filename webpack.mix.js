const { mix } = require('laravel-mix');

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

mix.scripts([
    'resources/assets/js/general_scripts.js',
    'resources/assets/js/dashboard.js',
    'resources/assets/js/add_video.js'
], 'public/js/all.js');

mix.styles([
    'resources/assets/css/styles.css'
], 'public/css/all.css');

mix.browserSync('http://localhost:8000');
