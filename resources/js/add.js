$(document).ready(function() {
    let timeout = null;
    
    $(document).on('click', '.btn-to-cart', function () {
        window.location = '/cart'
    });

    $(document).on('click', '._js-add-to-cart', function(e) {
        e.preventDefault();

        let button = $(this);        
        let productId = button.data('product-id');
        let count = button.closest('.cart-block').find('._js-product-count').val();

        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                product_id: productId,
                count: count,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('.cart .count').text(response.cart_count);

                button.addClass('btn-to-cart _active').removeClass('_js-add-to-cart');

                $('.cart-button').text('В корзине');
            },
            error: function(xhr) {
                console.error('Ошибка при добавлении в корзину');
            }
        });
    });

    $(document).on('click', '._js-b-plus', function(e) {
        e.preventDefault();

        let input = $(this).closest('._js-pcscontrolls').find('input');
        let availability = input.data('max');
        let value = parseInt(input.val());

        if (value >= availability) {
            showValidationPopup('Выбрано максимальное количество', 'info');
            setTimeout(function() { $('._js-validation-alert').hide(); }, 3000);
            return;
        }

        value++;
        input.val(value);

        if (window.location.pathname == '/cart') {
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                let productId = input.data('product-id');
                let count = value;
                let method = 'PUT';
                let url = "/cart/update";
                let send = {
                    product_id: productId,
                    count: count,
                };

                updateCart(url, send, method);
            }.bind(this), 1000);
        }

    });

    $(document).on('click', '._js-b-minus', function(e) {
        e.preventDefault();
        let input = $(this).closest('._js-pcscontrolls').find('input');
        let currentValue = parseInt(input.val());

        if (currentValue > 1) {
            input.val(currentValue - 1);
        }

        if (window.location.pathname == '/cart') {
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                let productId = input.data('product-id');
                let count = parseInt(input.val());
                let method = 'PUT';
                let url = "/cart/update";
                let send = {
                    product_id: productId,
                    count: count,
                    delivery_id: $('input[name="shop_id"]:checked').val(),
                    name: $('.cart-name').val(),
                    surname: $('.cart-surname').val(),
                    phone: $('.cart-phone').val(),
                    email: $('.cart-email').val(),
                    message: $('.cart-message').val(),
                    flight_number: $('.cart-flight-number').val(),
                    ticket_number: $('.cart-ticket-number').val(),
                };

                updateCart(url, send, method);
            }.bind(this), 1000);
        }
    });

    /**
     * Изменение кол-ва вручную
     */
    $(document).on('change', '._js-input-cart', function() {
        let input = $(this);
        let value = parseInt(input.val());
        let availability = input.data('max');

        if (value < 1) {
            value = 1;
            input.val(value);
        }

        if (value > availability) {
            value = availability;
            input.val(value);
        }

        let productId = input.data('product-id');
        let method = 'PUT';
        let url = "/cart/update";
        let send = {
            product_id: productId,
            count: parseInt(input.val()),
            delivery_id: $('._js-delivery:checked').val()
        };

        updateCart(url, send, method);
    });

    $(document).on('input', '._js-input-cart, ._js-product-count', function() {
        // Оставляем только цифры
        this.value = this.value.replace(/\D/g, '');

        // Проверяем минимальное значение
        if (this.value < 1 && this.value !== '') {
            this.value = 1;
        }

        // Проверяем максимальное значение
        let max = $(this).data('max');
        if (parseInt(this.value) > max) {
            this.value = max;
        }
    });

    $(document).on('click', '._js-remove-product-cart', function(e) {
        e.preventDefault();

        let method = 'DELETE';
        let url = "/cart/remove";
        let send = {
            cart_id: $(this).data('cart-id'),
            delivery_id: $('._js-delivery:checked').val()
        };

        updateCart(url, send, method);
    });

    function updateCart(url, send, method) {
        $.ajax({
            type: method,
            url: url,
            data: send,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if(response.success) {
                    if (!response.totalSum) {
                        window.location = '/'
                    }

                    if (window.location.pathname == '/cart') {
                        $('._js-cart-form').html(response.cartBlockHtml);
                    }

                    $('.cart .count').text(response.cart_count);
                }
            },
            error: function(xhr) {
            }
        });
    }

    $(document).on('submit', '.order-form', function(e) {
        e.preventDefault();

        let form = $(this);
        form.find('.input__default, .textarea__default').removeClass('error');
        form.find('.styled-figure').removeClass('error');

        $.ajax({
            url: '/order/create',
            type: 'POST',
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success && response.redirect) {
                    window.location = response.redirect;
                }
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                let errorMessages = [];

                if (errors) {
                    // Проходим по всем ошибкам
                    $.each(errors, function(field, messages) {
                        errorMessages.push(messages[0]);

                        // Подсвечиваем поля с ошибками
                        if (field === 'delivery_type_id') {
                            $('._js-delivery-type').closest('.custom-selector').addClass('error');
                        } else if (field === 'payment_type_id') {
                            $('._js-payment-type').closest('.custom-selector').addClass('error');
                        } else if (field === 'agree') {
                            form.find(`[name="${field}"]`).closest('.custom-selector').find('.styled-figure').addClass('error');
                        } else {
                            form.find(`[name="${field}"]`).addClass('error');
                        }
                    });
                }

                showValidationPopup(errorMessages, 'error');
                setTimeout(function() { $('._js-validation-alert').hide(); }, 3000);
            },
            complete: function() {
                submitButton.prop('disabled', false);
            }
        });        
        
    });

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
