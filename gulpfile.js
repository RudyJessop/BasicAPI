var elixir = require('laravel-elixir');

var dirSrc = 'node_modules/';
var copyDir = 'resources/assets/';
var publicDir = 'public/';



elixir(function(mix){

mix.browserify('workingfile.js', publicDir + 'js/workfile.js')

});