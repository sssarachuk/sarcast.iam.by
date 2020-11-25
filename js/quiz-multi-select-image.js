
$(document).ready(function(){
    $(".quiz-multi-select-image").on('change', function(e){
        const targetElement = e.target;

        if(targetElement.type == 'checkbox'){
            const selectedOption = targetElement.value;
            const selectedOptionChecked = targetElement.checked;

            if(selectedOptionChecked){
                $(targetElement.parentElement).addClass('quiz-multi-select-image__item--selected');
            }
            else{
                $(targetElement.parentElement).removeClass('quiz-multi-select-image__item--selected');
            }

            $.post($(location).href, { selectedOption, selectedOptionChecked});
        }
    });
});