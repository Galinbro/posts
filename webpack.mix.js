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


mix.js('resources/js/app.js','public/js')
        .sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/app2.scss', 'public/css');

    mix.scripts([
        'resources/js/libs/jquery.js',
        'resources/js/libs/bootstrap.js',
        'resources/js/libs/metisMenu.js',
        'resources/js/libs/sb-admin-2.js',
        'resources/js/libs/scripts.js'
    ], 'public/js/libs.js');

mix.styles([
    'resources/css/libs/bootstrap.css',
    'resources/css/libs/blog-post.css',
    'resources/css/libs/font-awesome.css',
    'resources/css/libs/metisMenu.css',
    'resources/css/libs/sb-admin-2.css',
], 'public/css/libs.css');

mix.styles([
    'resources/css/home/bootstrap.css',
    'resources/css/home/animsition.min.css',
    'resources/css/home/slick.css',
    'resources/css/home/main.css',
    'resources/css/home/util.css',
], 'public/css/home.css');


mix.scripts([
    'resources/js/home/jquery-3.2.1.min.js',
    'resources/js/home/animsition.min.js',
    'resources/js/home/popper.min.js',
    'resources/js/home/bootstrap.min.js',
    'resources/js/home/slick.min.js',
    'resources/js/home/slick-custom,min.js',
    'resources/js/home/parallax100.js',
    'resources/js/home/main.js',
], 'public/js/home.js');

mix.scripts([
    'resources/js/home/orgchart.js',
], 'public/js/org.js');

