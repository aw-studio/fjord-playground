const mix = require("laravel-mix");

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

mix.webpackConfig({
    resolve: {
        alias: {
            "@fj-js": path.resolve(
                __dirname,
                "vendor/aw-studio/fjord/resources/js/"
            ),
            "@fj-sass": path.resolve(
                __dirname,
                "vendor/aw-studio/fjord/resources/sass/"
            )
        }
    }
});

mix.js("resources/js/app.js", "public/fjord/js").browserSync({
    proxy: "fjord-playground.aw",
    notify: false
});
