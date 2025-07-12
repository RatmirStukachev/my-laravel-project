$(document).ready(function() {

    $(document).on('input', 'input[name="phone"]', function () {
        // Оставляем только цифры и плюс в начале
        this.value = this.value.replace(/[^\d+]/g, '')
            .replace(/(^\+)?([+\d]*)/, '$1$2') // оставляем плюс только в начале
            .replace(/^\+{2,}/, '+'); // убираем лишние плюсы в начале
    });
    
    // Обработчик для формы обратной связи
    $(document).on('submit', '.form-callback', function(e) {
        e.preventDefault();
    
        let form = $(this);
        form.find('.input__default').removeClass('error');
        form.find('.styled-figure').removeClass('error');
        
        $.ajax({
            url: '/send-callback',
            method: 'POST',
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('.s-popup').hide();
                $('.w-popup').hide();
                $('.s-popup__background').hide();
                $('.w-popup').removeClass('animate');
                showValidationPopup(response.message, 'success');
                form.find('.input__default').val('');
                setTimeout(function() { $('._js-validation-alert').hide(); }, 3000);
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessages = [];

                if (errors) {
                    // Проходим по всем ошибкам
                    $.each(errors, function(field, messages) {
                        errorMessages.push(messages[0]);

                        // Проверяем реальное наличие ошибки для delivery_id и payment_type_id
                        if (field === 'delivery_id' && !selectedDelivery.val()) {
                            $('._js-delivery-block').addClass('error');
                        } else if (field === 'payment_type_id' && !selectedPaymentType.val()) {
                            $('._js-payment-block').addClass('error');
                        } else if (field === 'agree') {
                            form.find(`[name="${field}"]`).closest('.custom-selector').find('.styled-figure').addClass('error');
                        } else {
                            form.find(`[name="${field}"]`).addClass('error');
                        }
                    });
                }

                showValidationPopup(errorMessages, 'error');
                setTimeout(function() { $('._js-validation-alert').hide(); }, 3000);
            }
        });
    });

    function showValidationPopup(messages, type) {
        let popup = $('.s-validation');
        let content = popup.find('.w-icon-left .content ul');
        let alertBox = popup.find('.w-validation-alert');

        content.empty();
        if (Array.isArray(messages)) {
            $.each(messages, function(index, message) {
                content.append('<li>' + message + '</li>');
            });
        } else {
            content.append('<li>' + messages + '</li>');
        }

        if (type === 'success') {
            alertBox.removeClass('color002').addClass('color001');
        } else {
            alertBox.removeClass('color001').addClass('color002');
        }

        popup.removeClass('hide').fadeIn(300);

        // setTimeout(function() {
        //     popup.fadeOut(300, function() {
        //         popup.addClass('hide');
        //     });
        // }, 1500);
    }
});
