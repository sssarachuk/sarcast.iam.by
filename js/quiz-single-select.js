$(document).ready(function(){
    $(".quiz-single-select").on('change', function(e){
        const targetElement = e.target;

        if(targetElement.type == 'radio'){
            const selectedOption = targetElement.value;

            $.post($(location).href, {selectedOption});
        }
    });
});