$(document).ready(function(){

    const datepicker = $('#quiz-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd/mm/yy",
        showOn: "button",
        buttonImage: "images/calendar-icon.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        minDate: 0,
    });

    datepicker.on('change', function(e){
        const targetElement = e.target;

        if(targetElement.type == 'text'){

            const selectedOption = targetElement.value;

            $.post($(location).href, { selectedOption });
        }
    })

});