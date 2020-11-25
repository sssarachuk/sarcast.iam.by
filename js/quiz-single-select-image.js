$(document).ready(function(){
    $(".quiz-single-select-image").on('change', function(e){
        const targetElement = e.target;

        if(targetElement.type == 'radio'){
            const selectedOption = targetElement.value;

            $(targetElement.parentElement).siblings().removeClass('quiz-single-select-image__item--selected');
            $(targetElement.parentElement).addClass('quiz-single-select-image__item--selected');

            $.post($(location).href, {selectedOption});
        }
    });
});