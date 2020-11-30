$(document).ready(function(){

    const fromInput = $('#quiz-range-selector-from');
    const toInput = $('#quiz-range-selector-to');
    const rangeSlider = $("#quiz-range-selector-slider");

    rangeSlider.slider({
        range: true,
        min: rangeSlider.data().min,
        max: rangeSlider.data().max,
        values: [ fromInput.val(), toInput.val() ],
        slide: function( event, ui ) {
            fromInput.val(ui.values[0]);
            toInput.val(ui.values[1]);
        },
        stop: function(event, ui) {
            $.post($(location).href, { selectedOption: ui.values[0], index: 0});
            $.post($(location).href, { selectedOption: ui.values[1], index: 1});
        }
    });

    function adjustFromValue(fromValue){
        const fromValueInt = Number(fromValue);

        const minRangeSliderValue = rangeSlider.slider('option', 'min');
        if(fromValueInt < minRangeSliderValue){
            return minRangeSliderValue;
        }

        const toValue = $(toInput).val();
        const toValueInt = Number(toValue);
        if(fromValueInt > toValueInt){
            return toValueInt;
        }

        return fromValueInt;
    }

    function adjustToValue(toValue){
        const toValueInt = Number(toValue);

        const maxRangeSliderValue = rangeSlider.slider('option', 'max');
        if(toValueInt > maxRangeSliderValue){
            return maxRangeSliderValue;
        }

        const fromValue = $(fromInput).val();
        const fromValueInt = Number(fromValue);
        if(toValueInt < fromValueInt){
            return fromValueInt;
        }

        return toValueInt;
    }

    fromInput.on('change', function(e){
        const element = this;
        const fromValue = $(element).val();
        const adjustedFromValue = adjustFromValue(fromValue);

        $(element).val(adjustedFromValue);
        rangeSlider.slider('values', 0, adjustedFromValue);
        $.post($(location).href, { selectedOption: adjustedFromValue, index: 0});
    });

    toInput.on('change', function(e){
        const element = this;
        const toValue = $(element).val();
        const adjustedToValue = adjustToValue(toValue);

        $(element).val(adjustedToValue);
        rangeSlider.slider('values', 1, adjustedToValue);
        $.post($(location).href, { selectedOption: adjustedToValue, index: 1});
    });
});