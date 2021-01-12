const hideShowEmailPhone = (type) => {
    switch(type) {
        case 'Telegram':
        case 'Viber':
        case 'WhatsApp':
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

    const btnWrappers = $('.btn-group').find('.btn-wrapper');

    for(let btnWrapper of btnWrappers) {
        const radio = $(btnWrapper).find('input[type=radio]');
        const value = $(radio).val();
        $(btnWrapper).addClass(value.toLowerCase());
        if($(radio).is(":checked")) {
            $(radio).parent().addClass('active');
            hideShowEmailPhone(value);
        }

        const iconElement = $('<span>').addClass('mdi');

        switch(value) {
            case 'Telegram':
                iconElement.addClass('mdi-telegram');
                break;
            case 'Viber':
            case 'WhatsApp':
                iconElement.addClass('mdi-whatsapp');
                break;
            case 'Email':
                iconElement.addClass('mdi-email');
                break;
        }
        $(btnWrapper).prepend(iconElement);

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