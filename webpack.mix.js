const mix = require('laravel-mix');

// Compile Bootstrap and custom JS/CSS
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .version()
   .options({
        hmrOptions: {
            host: 'localhost',
            port: '5173',
        },
    });
