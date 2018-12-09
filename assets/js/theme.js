/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 20-11-2018 00:23
 * Licence: GPLv3 - General Public Licence version 3
 * Description: $
 */
// Import Jquery and Jquery dependent libraries.
import $ from 'jquery';
import 'popper.js'
import 'jquery.easing'
import 'chart.js'
// Import matirialize css.
import 'materialize-css/dist/js/materialize.min'
import 'materialize-css/dist/css/materialize.min.css'
// Import the stylesheets that define the sites theme.
import '../scss/theme.scss'

// Import Maritialize Icons.

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});


$(document).ready(function () {
    $('select').formSelect();
});



var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Activeren", "Negeren", "Reageren"],
        datasets: [{
            label: "Number of votes",
            data: [6, 12, 4],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

/* todo figure out which one to use.
$(document).ready(function () {
    $('.tooltipped').tooltip();
});
*/