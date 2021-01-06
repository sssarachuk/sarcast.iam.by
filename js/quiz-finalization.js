$(document).ready(function() {
    const btnGetResults = $('#btnGetResults');
    const finalizationForm = $('#quizFinalizationForm')

    btnGetResults.on('click', () => {
        finalizationForm.submit();
    });

    const radioButtons = $('.btn-group').find('input[type=radio]');

    for(let radio of radioButtons) {
        if($(radio).is(":checked")) {
            $(radio).parent().addClass('active');
        }
    }

    $('.btn-group').on('change', function(e){

        $(this).find('div.btn').removeClass('active');

        const targetElement = e.target;

        if(targetElement.type == 'radio'){
            $(targetElement).parent().addClass('active');

        }
    });

});