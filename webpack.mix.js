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
const path = require('path');

//mix.webpackConfig({
//    entry: './resources/js/teste.js',
//    mode: 'development',
//    module: {
//      rules: [
//        {
//          test: /\.js$/,
//          exclude: /(node_modules|bower_components)/,
//          use: {
//            loader: 'babel-loader',
//            options: {
//              presets: ['@babel/preset-env']
//            }
//          }
//        }]
//    },
//    // this needs to be added to build a library target as ESM
//    experiments: {
//      outputModule: true
//    },
//    output: {
//      // and also this — which requires the previous block
//      libraryTarget: 'module',
//      filename: 'novo.js',
//      path: path.resolve(__dirname, 'public/js')
//    }
//});
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/entradaProdutos.js', 'public/js/entradaProdutos.js')    
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
//    .css('resources/css/header.css', 'public/css')  
//    .css('resources/css/footer.css', 'public/css')   
    .dump();
