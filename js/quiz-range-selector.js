$(document).ready(function(){

    const fromInput = $('#quiz-range-selector-from');
    const toInput = $('#quiz-range-selector-to');
    const slider = $("#quiz-range-selector-slider");

    $("#quiz-range-selector-slider").slider({
        range: true,
        min: slider.data().min,
        max: slider.data().max,
        values: [ fromInput.val(), toInput.val() ],
        slide: function( event, ui ) {
            fromInput.val(ui.values[0]);
            toInput.val(ui.values[1]);
        }
    });
});