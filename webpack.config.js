var Encore = require('@symfony/webpack-encore');
const CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    .createSharedEntry(
        'theme', './assets/js/theme.js'
    )
    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
ba     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */
    .addEntry('app', './assets/js/theme.js')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    // Automaticly provide JQuery for the whole project.
    .autoProvidejQuery()

    // Enable the SASS preprocessor.
    .enableSassLoader()

    // Enable the PostCSSLoader for auto prefixing vendor css like -moz- -webkit etc.
    .enablePostCssLoader()

    // Enable webpack copy plugin to optimize image imports.
    .addPlugin(new CopyWebpackPlugin([
            // Copies images
            {from: './assets/img', to: 'static'}
        ])
    )

    // Remove the previous output before building a new project.
    .cleanupOutputBeforeBuild()

    // Enable build push notifications.
    .enableBuildNotifications()

    // Enable source maps for browser debugging.
    .enableSourceMaps(!Encore.isProduction())

    // Enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();
