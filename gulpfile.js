// Elixir's gulpfile.js
const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
    mix.sass('app.js')
        .webpack('app.js');
});