const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]).vue({ version: 2 });

mix.extract([
    'vue',
    'tailwindcss',
    'postcss',
    'laravel-mix',
    'lodash',
    'alpine',
    'filepond',
    'vue-filepond',
    'filepond-plugin-file-validate-type',
    'filepond-plugin-image-preview',
    'filepond-plugin-file-encode',
])

mix.browserSync({
    proxy: 'http://localhost:8000',
    open: false,
    snippetOptions: {
        rule: {
            match: /<\/body>/i,
            fn: function (snippet, match) {
                return snippet + match;
            }
        }
    }
});

if (mix.inProduction()) {
    mix.version();
}
