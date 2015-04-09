var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'bootstrap': './node_modules/bootstrap-sass/assets/',
    'jquery': './node_modules/jquery/dist/',
    'underscore': './node_modules/underscore/',
    'backbone': './node_modules/backbone/',
    'app': './resources/js/'
};

elixir(function (mix) {
    mix.rubySass('app.scss', 'public/css/')
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .scripts([
            // necessary components
            paths.jquery + "jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.underscore + "underscore.js",
            paths.backbone + "backbone.js",
            // app
            paths.app + "app.js"
        ], 'public/js/app.js', './');

});
