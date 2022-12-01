let mix = require('laravel-mix');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'platform/themes/' + directory;
const dist = 'public/themes/' + directory;

mix.js(source + '/assets/js/app.js', dist + '/js').vue({version: 2});

mix
    .sass(source + '/assets/sass/style.scss', dist + '/css')
    .js(source + '/assets/js/script.js', dist + '/js')
    .js(source + '/assets/js/icons-field.js', dist + '/js')
    .js(source + '/assets/js/main.js', dist + '/js')
    .js(source + '/assets/js/ecommerce.js', dist + '/js')

    .copyDirectory(dist + '/css', source + '/public/css')
    .copyDirectory(dist + '/js', source + '/public/js');
