$(document).ready(function(){

    $("#quiz-range-selector-slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 75, 300 ],
        slide: function( event, ui ) {
            $( "#quiz-range-selector" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#quiz-range-selector" ).val( "$" + $( "#quiz-range-selector-slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#quiz-range-selector-slider-range" ).slider( "values", 1 ) );

});