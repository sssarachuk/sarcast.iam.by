$(document).ready(function(){

    const fromInput = $('#quiz-range-selector-from');
    const toInput = $('#quiz-range-selector-to');
    const slider = $("#quiz-range-selector-slider");

    $("#quiz-range-selector-slider").slider({
        range: true,
        min: slider.data().min,
        max: slider.data().max,
        values: [ fromInput.val(), toInput.val() ],
        step: 5,
        slide: function( event, ui ) {
            fromInput.val(ui.values[0]);
            toInput.val(ui.values[1]);
        }
    });

    fromInput.on('change', function(e){
        const element = this;
        const fromValue = $(element).val();
        const fromValueInt = Number(fromValue);
        const step = $(element).data().step;
    });
});