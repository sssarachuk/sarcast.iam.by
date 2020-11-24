
$(document).ready(function(){
    $(".quiz-multi-select").on('change', function(e){
        const targetElement = e.target;

        if(targetElement.type == 'checkbox'){
            const selectedOption = targetElement.value;
            const selectedOptionChecked = targetElement.checked;

            $.post($(location).href, { selectedOption, selectedOptionChecked});
        }
    });
});