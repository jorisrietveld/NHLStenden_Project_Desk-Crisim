/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 20-11-2018 00:23
 * Licence: GPLv3 - General Public Licence version 3
 * Description: $
 */
import $ from 'jquery';
import 'popper.js'
import 'tether'
import 'jquery.easing'

// Import matirialize css.
import 'materialize-css/dist/js/materialize.min'
import 'materialize-css/sass/materialize.scss'

// Import the stylesheets that define the sites theme.
import '../scss/theme/theme.scss'

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

/* todo figure out which one to use.
$(document).ready(function () {
    $('.tooltipped').tooltip();
});
*/