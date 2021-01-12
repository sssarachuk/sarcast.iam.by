const hideShowEmailPhone = (type) => {
    switch(type) {
        case 'Telegram':
        case 'Viber':
        case 'WatsUp':
            $(".form-row.email").hide();
            $(".form-row.phone").show();
            break;
        case 'Email':
            $(".form-row.phone").hide();
            $(".form-row.email").show();
            break;
    }
}

$(document).ready(function() {
    const btnGetResults = $('#btnGetResults');
    const finalizationForm = $('#quizFinalizationForm')

    btnGetResults.on('click', () => {
        finalizationForm.submit();
    });

    const radioButtons = $('.btn-group').find('input[type=radio]');

    for(let radio of radioButtons) {
        if($(radio).is(":checked")) {
            $(radio).parent().find('label.btn').addClass('active');
            hideShowEmailPhone($(radio).val());
        }
    }

    $('.btn-group').on('change', function(e){

        $(this).find('label.btn').removeClass('active');

        const targetElement = e.target;

        if(targetElement.type == 'radio'){
            $(targetElement).parent().find('label.btn').addClass('active');
        }

        hideShowEmailPhone(targetElement.value);
    });

});