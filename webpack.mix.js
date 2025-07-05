const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copyDirectory('resources/images', 'public/images');
mix.copyDirectory('resources/fonts', 'public/fonts');

mix.sass('resources/sass/app.scss', 'public/css');

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/ikon.js', 'public/js')
    .js('resources/js/csillag.js', 'public/js')
    .js('resources/js/termek_fooldal_kepek.js', 'public/js')
;
