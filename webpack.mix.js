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

mix.scripts(['node_modules/jquery/dist/jquery.min.js',
			'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
			'node_modules/bootstrap/dist/js/bootstrap.min.js',
			'node_modules/mdbootstrap/js/mdb.min.js'],'public/js/scripts-file.js')
   .js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');