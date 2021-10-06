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

// mix.js('resources/js/app.js', 'public/js')
//     .styles([
//         'resources/css/main/styles.css',
//         'resources/css/home/styles.css',
//         'resources/css/authors/styles.css',
//         'resources/css/contacts/styles.css',
//         'resources/css/quotes/styles.css',
//         'resources/css/categories/styles.css',],
//         'public/css/app.css');

mix.js('resources/js/app.js', 'public/js')
    .styles([
        'resources/css/main/styles.css',
        'resources/css/home/styles.css',
        'resources/css/quotes/styles.css',
        'resources/css/authors/styles.css',],
        'public/css/app.css');

if (mix.inProduction()) {
    mix.version();
}

mix.disableNotifications();