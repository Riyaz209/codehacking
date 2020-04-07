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
/*
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');*/

/*
mix.styles([
    'public/css/vendor/normalize.css',
    'public/css/vendor/videojs.css'
], 'public/css/all.css');

mix.scripts([
    'public/js/admin.js',
    'public/js/dashboard.js'
], 'public/js/all.js');*/

//'resources/assets/css/libs/styles.css'

mix.styles([
    'resources/assets/css/libs/blog-post.css',
	'resources/assets/css/libs/bootstrap.css',
	'resources/assets/css/libs/font-awesome.css',
	'resources/assets/css/libs/metisMenu.css',
    'resources/assets/css/libs/sb-admin-2.css',
	'resources/assets/css/libs/styles.css'
], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/jquery.js',
	'resources/assets/js/libs/bootstrap.js',
	'resources/assets/js/libs/metisMenu.js',
	'resources/assets/js/libs/sb-admin-2.js',
    'resources/assets/js/libs/scripts.js'
], 'public/js/libs.js');