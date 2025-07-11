$(document).ready(function() {
    let timeout = null;

    //Подсказки для поиска (fast-search)
     let searchTimer;
     $(document).on('input', '._js-fast-search', function() {
        let searchText = $(this).val();
        clearTimeout(searchTimer);

        if (searchText.length > 2) {
            searchTimer = setTimeout(function() {
                $.ajax({
                    url: '/fast-search',
                    method: 'POST',
                    data: {
                        query: searchText
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('._js-fast-search-results').html(response.products);
                    },
                    error: function(xhr) {
                        $('._js-fast-search-results').empty();
                    }
                });
            }, 1000);
        } else {
            $('._js-fast-search-results').empty();
        }
     });

    $(document).on('click', '.btn-to-cart', function () {
        window.location = '/cart'
    });

    $(document).on('click', '._js-add-to-cart', function(e) {
        e.preventDefault();

        let button = $(this);        
        let productId = button.data('product-id');
        let count = button.closest('.w-product-page-to-cart-group').find('._js-product-count').val();

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
                let url = "/cart/update";
                let send = {
                    product_id: productId,
                    count: count,
                };

                updateCart(url, send);
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

                updateCart(url, send);
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
        let url = "/cart/update";
        let send = {
            product_id: productId,
            count: parseInt(input.val()),
            delivery_id: $('._js-delivery:checked').val()
        };

        updateCart(url, send);
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

        let url = "/cart/remove";
        let send = {
            cart_id: $(this).data('cart-id'),
            delivery_id: $('._js-delivery:checked').val()
        };

        updateCart(url, send);
    });

    function updateCart(url, send) {
        $.ajax({
            type: 'POST',
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

    // ОБРАБОТЧИК ЗАКАЗА
    //
    $(document).on('submit', '.order-form', function(e) {
        e.preventDefault();

        let form = $(this);
        let submitButton = form.find('button[type="submit"]');
        
        // Отключаем кнопку для предотвращения повторной отправки
        submitButton.prop('disabled', true);
        
        // Очищаем предыдущие ошибки
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
                        } else if (field === 'customer') {
                            $('._js-change-customer').closest('.custom-selector').addClass('error');
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

    // Обработчик для формы быстрого заказа
    $(document).on('submit', '.fast-order-form', function(e) {
        e.preventDefault();
    
        let form = $(this);
        form.find('.input__default').removeClass('error');
        form.find('.styled-figure').removeClass('error');
        
        $.ajax({
            url: '/order/fast-order',
            method: 'POST',
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                window.location = response.redirect;
                $('.w-pop-order-product').hide();
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


     // Обработчик для формы обратной связи
     $(document).on('submit', '.callback-request-form, .callback-form, .callback-contacts-page', function(e) {
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

         // Обработчик для формы нашли-дешевле
         $(document).on('submit', '.find_cheaper', function(e) {
            e.preventDefault();
        
            let form = $(this);
            form.find('.input__default').removeClass('error');
            form.find('.styled-figure').removeClass('error');
            
            let formData = new FormData(form[0]);
    
            $.ajax({
                url: '/find-cheaper',
                method: 'POST',
                data: formData,
                processData: false, // Отключаем обработку данных jQuery
                contentType: false, // Отключаем установку Content-Type jQuery
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('.s-popup').hide();
                    $('.w-popup').hide();
                    $('.s-popup__background').hide();
                    $('.w-popup').removeClass('animate');
                    showValidationPopup(response.message, 'success');
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

     // Обработчик для формы техобслуживания
     $(document).on('submit', '.repair-form, .send-task', function(e) {
        e.preventDefault();
    
        let form = $(this);
        form.find('.input__default').removeClass('error');
        form.find('.styled-figure').removeClass('error');
        
        let formData = new FormData(form[0]);

        $.ajax({
            url: '/send-callback',
            method: 'POST',
            data: formData,
            processData: false, // Отключаем обработку данных jQuery
            contentType: false, // Отключаем установку Content-Type jQuery
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('.s-popup').hide();
                $('.w-popup').hide();
                $('.s-popup__background').hide();
                $('.w-popup').removeClass('animate');
                showValidationPopup(response.message, 'success');
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

    $(document).on('input', 'input[name="phone"]', function () {
        // Оставляем только цифры и плюс в начале
        this.value = this.value.replace(/[^\d+]/g, '')
            .replace(/(^\+)?([+\d]*)/, '$1$2') // оставляем плюс только в начале
            .replace(/^\+{2,}/, '+'); // убираем лишние плюсы в начале
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

    $(document).on('change', '#filters-form input[type="checkbox"], input[type="text"], #filters-form input[name="min_price"], #filters-form input[name="max_price"]', function() {
        let form = $(this).closest('form').serialize();

        clearTimeout(searchTimer);

        searchTimer = setTimeout(function() {
            $.ajax({
                url: '/catalog/get-count',
                method: 'POST',
                data: form,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('._js-product-count').text(response.count);
                },
                error: function(xhr) {
                    console.error('An error occurred while fetching product count.');
                }
            });
        }, 1000);
    });

    // ОБРАБОТЧИК ДОБАВЛЕНИЯ-УДАЛЕНИЯ СРАВНЕНИЯ ТОВАРОВ
    //
    $(document).on('click', '._js-compare-toggle', function() {
        const $checkbox = $(this);
        const productId = $checkbox.closest('[data-product-id]').data('product-id');
        const $headerIcon = $('._js-compare-icon');

        $.ajax({
            url: '/comparison/toggle',
            method: 'POST',
            data: {
                product_id: productId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.is_in_compare) {
                    $checkbox.prop('checked', true);
                } else {
                    $checkbox.prop('checked', false);
                }

                if (response.count > 0) {
                    $headerIcon.addClass('_active');
                } else {
                    $headerIcon.removeClass('_active');
                }                
            },
            error: function(xhr) {
                console.error('Ошибка при добавлении товара в сравнение', xhr);
                // В случае ошибки возвращаем чекбокс в предыдущее состояние
                $checkbox.prop('checked', !$checkbox.prop('checked'));
            }
        });
    });

    // ОБРАБОТЧИК СКРЫТИЯ ОДИНАКОВЫХ ПАРАМЕТРОВ В СРАВНЕНИИ
    $(document).on('change', 'input[name="hide-same-params"]', function() {
        const $checkbox = $(this);
        const hideParams = $checkbox.is(':checked');

        $.ajax({
            url: '/comparison/hide-same-params',
            method: 'POST',
            data: {
                hide_same_params: hideParams
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.mainCharacteristicsHtml !== undefined) {
                    $('.main-characteristics-block').html(response.mainCharacteristicsHtml);
                }
                if (response.otherCharacteristicsHtml !== undefined) {
                    $('.other-characteristics-block').html(response.otherCharacteristicsHtml);
                }
            },
            error: function(xhr) {
                console.error('Ошибка при фильтрации характеристик', xhr);
            }
        });
    });

    // Обработчик переключения табов (перенесено из main.js) + сохранение в localStorage
    if ($('._js-switchible-tabs').length) {
        const STORAGE_KEY = 'catalog_view_type';
        
        // Основной обработчик клика по табам
        $('._js-w-tabs ._js-change-tab').on('click', function () {
            var tabs_id = $(this).attr('data-tabs-id');
            
            // Оригинальная логика переключения табов из main.js
            $(this).parents('._js-switchible-tabs.' + tabs_id).find('._js-w-tabs-content ._js-tab-content.' + tabs_id).removeClass('_active').eq($(this).parents('._js-parent-element.' + tabs_id).index()).addClass('_active');
            $(this).parents('._js-w-tabs.' + tabs_id).find('._js-parent-element.' + tabs_id).removeClass('_active').eq($(this).parents('._js-parent-element.' + tabs_id).index()).addClass('_active');
            $(this).parents('._js-w-tabs.' + tabs_id).find('._js-change-tab').removeClass('_active').eq($(this).parents('._js-parent-element.' + tabs_id).index()).addClass('_active');

            $('._js-mobile-select-overlay').removeClass('_toggled-mobile');
            
            // Дополнительно сохраняем в localStorage для каталога
            if (tabs_id === 'id-tab-level_001') {
                const tabsContainer = $(this).parents('._js-w-tabs.' + tabs_id);
                const viewIndex = $(this).parents('._js-parent-element.' + tabs_id).index();
                localStorage.setItem(STORAGE_KEY, viewIndex.toString());
                console.log('Сохранен тип отображения каталога:', viewIndex);
            }
            
            return false;
        });
        
        // Восстанавливаем сохраненный тип отображения при загрузке страницы
        function restoreViewType() {
            const savedViewType = localStorage.getItem(STORAGE_KEY);
            if (savedViewType !== null) {
                const viewIndex = parseInt(savedViewType);
                const tabsContainer = $('._js-w-tabs.id-tab-level_001');
                const parentElements = tabsContainer.find('._js-parent-element.id-tab-level_001');
                const changeTabLinks = tabsContainer.find('._js-change-tab');
                const tabContents = $('._js-w-tabs-content.id-tab-level_001 ._js-tab-content.id-tab-level_001');
                
                if (parentElements.length > viewIndex && tabContents.length > viewIndex) {
                    // Убираем активные классы со всех элементов
                    parentElements.removeClass('_active');
                    changeTabLinks.removeClass('_active');
                    tabContents.removeClass('_active');
                    
                    // Добавляем активный класс к выбранному элементу
                    parentElements.eq(viewIndex).addClass('_active');
                    changeTabLinks.eq(viewIndex).addClass('_active');
                    tabContents.eq(viewIndex).addClass('_active');
                    
                    console.log('Восстановлен тип отображения каталога:', viewIndex);
                }
            }
        }
        
        // Восстанавливаем при загрузке с небольшой задержкой
        setTimeout(restoreViewType, 100);
    }

    // ========================================
    // ОБРАБОТЧИКИ ЧЕКБОКСОВ КОРЗИНЫ
    // ========================================

    // Обработчик главного чекбокса "Выделить все"
    $(document).on('change', '._js-select-all-cart', function() {
        const isChecked = $(this).is(':checked');
        
        // Проставляем/снимаем флажки со всех товаров
        $('._js-cart-item-checkbox').prop('checked', isChecked);
        
        // Обновляем состояние кнопки "Удалить выбранные"
        updateDeleteSelectedButton();
    });

    // Обработчик чекбоксов отдельных товаров
    $(document).on('change', '._js-cart-item-checkbox', function() {
        const totalItems = $('._js-cart-item-checkbox').length;
        const checkedItems = $('._js-cart-item-checkbox:checked').length;
        
        // Обновляем состояние главного чекбокса
        if (checkedItems === 0) {
            // Ничего не выбрано
            $('._js-select-all-cart').prop('checked', false).prop('indeterminate', false);
        } else if (checkedItems === totalItems) {
            // Все выбрано
            $('._js-select-all-cart').prop('checked', true).prop('indeterminate', false);
        } else {
            // Частично выбрано
            $('._js-select-all-cart').prop('checked', false).prop('indeterminate', true);
        }
        
        // Обновляем состояние кнопки "Удалить выбранные"
        updateDeleteSelectedButton();
    });

    // Функция для обновления состояния кнопки "Удалить выбранные"
    function updateDeleteSelectedButton() {
        const checkedItems = $('._js-cart-item-checkbox:checked').length;
        const deleteButton = $('.delete__link');
        
        if (checkedItems > 0) {
            deleteButton.removeClass('disabled').attr('href', '#');
            deleteButton.find('.dashed').text(`Удалить выбранные (${checkedItems})`);
        } else {
            deleteButton.addClass('disabled').attr('href', '');
            deleteButton.find('.dashed').text('Удалить выбранные');
        }
    }

    // Обработчик кнопки "Удалить выбранные"
    $(document).on('click', '.delete__link', function(e) {
        e.preventDefault();
        
        const checkedItems = $('._js-cart-item-checkbox:checked');
        
        if (checkedItems.length === 0) {
            return false;
        }
        
        // // Подтверждение удаления
        // if (!confirm(`Вы действительно хотите удалить выбранные товары (${checkedItems.length} шт.)?`)) {
        //     return false;
        // }
        
        // Собираем ID корзины для удаления
        const cartIds = [];
        checkedItems.each(function() {
            cartIds.push($(this).data('cart-id'));
        });
        
        // Удаляем товары по очереди
        let deletedCount = 0;
        const totalToDelete = cartIds.length;
        
        cartIds.forEach(function(cartId) {
            $.ajax({
                type: 'POST',
                url: '/cart/remove',
                data: {
                    cart_id: cartId,
                    delivery_id: $('._js-delivery:checked').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    deletedCount++;
                    
                    // Если это последний удаляемый товар, обновляем интерфейс
                    if (deletedCount === totalToDelete) {
                        if (response.success) {
                            if (!response.totalSum) {
                                window.location = '/';
                            } else {
                                if (window.location.pathname === '/cart') {
                                    $('._js-cart-form').html(response.cartBlockHtml);
                                }
                                $('.cart .count').text(response.cart_count);
                            }
                        }
                    }
                },
                error: function(xhr) {
                    console.error('Ошибка при удалении товара из корзины', xhr);
                }
            });
        });
    });

    // Инициализация состояния при загрузке страницы корзины
    if (window.location.pathname === '/cart') {
        setTimeout(function() {
            updateDeleteSelectedButton();
        }, 100);
    }

    // Обработчик изменения типа клиента
    $(document).on('change', '._js-change-customer', function() {
        const customerType = $(this).val();
        
        if (!customerType) {
            return;
        }

        // Показываем индикатор загрузки для способов оплат
        const $paymentContainer = $('._js-payment-types-container');
        $paymentContainer.html('<div class="text-center"><p>Загрузка способов оплаты...</p></div>');

        // Показываем индикатор загрузки для полей получателя
        const $fieldsContainer = $('._js-customer-fields-container');
        $fieldsContainer.html('<div class="text-center"><p>Обновление полей...</p></div>');

        $.ajax({
            url: '/order/change-customer',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                customer_type: customerType,
            },
            success: function(response) {
                if (response.success) {
                    // Обновляем HTML с способами оплат
                    $paymentContainer.html(response.payment_types_html);
                    
                    // Обновляем HTML с полями получателя
                    $fieldsContainer.html(response.customer_fields_html);
                    
                    // Обновляем блок итогов заказа с типом клиента
                    updateOrderSummaryCustomer(customerType);
                    
                    // Сбрасываем способ оплаты в итогах, так как список изменился
                    updateOrderSummaryPaymentType('Не выбрано');
                    
                    console.log('Тип клиента изменен на:', response.customer_type);
                } else {
                    $paymentContainer.html('<div class="alert alert-danger"><p>Ошибка при загрузке способов оплаты</p></div>');
                    $fieldsContainer.html('<div class="alert alert-danger"><p>Ошибка при обновлении полей</p></div>');
                }
            },
            error: function(xhr) {
                console.error('Ошибка при изменении типа клиента:', xhr);
                $paymentContainer.html('<div class="alert alert-danger"><p>Ошибка при загрузке способов оплаты</p></div>');
                $fieldsContainer.html('<div class="alert alert-danger"><p>Ошибка при обновлении полей</p></div>');
            }
        });
    });

    // Автоматически загружаем способы оплат при загрузке страницы, если выбран тип клиента
    if (window.location.pathname === '/order/index') {
        setTimeout(function() {
            const selectedCustomer = $('._js-change-customer:checked');
            if (selectedCustomer.length > 0) {
                console.log('Автоматическая загрузка способов оплат для:', selectedCustomer.val());
                // Не триггерим change, так как способы оплат уже загружены с сервера
                // selectedCustomer.trigger('change');
            }
            
            // Проверяем предустановленный способ доставки для правильного отображения блока адреса
            const selectedDelivery = $('._js-delivery-type:checked');
            if (selectedDelivery.length > 0) {
                const deliveryId = parseInt(selectedDelivery.data('delivery-id'));
                const $addressBlock = $('._js-delivery-address');
                const DELIVERY_TO_ADDRESS = 2;
                
                if (deliveryId === DELIVERY_TO_ADDRESS) {
                    $addressBlock.show();
                    console.log('Инициализация: показан блок адреса доставки');
                } else {
                    $addressBlock.hide();
                    console.log('Инициализация: скрыт блок адреса доставки');
                }
            }
        }, 100);
    }

    // ========================================
    // ОБРАБОТЧИКИ ТИПОВ ДОСТАВКИ
    // ========================================

    // Функции для обновления блоков итогов заказа
    function updateOrderSummaryCustomer(customerType) {
        $('.checked-customer').text(customerType);
        console.log('Обновлен тип покупателя в итогах:', customerType);
    }

    function updateOrderSummaryPaymentType(paymentTitle) {
        $('.checked-payment-type').text(paymentTitle);
        console.log('Обновлен способ оплаты в итогах:', paymentTitle);
    }

    function updateOrderSummaryDeliveryType(deliveryTitle) {
        $('.checked-delivery-type').text(deliveryTitle);
        console.log('Обновлен способ доставки в итогах:', deliveryTitle);
    }

    // Обработчик изменения типа покупателя
    $(document).on('change', '._js-change-customer', function() {
        const customerType = $(this).val();
        updateOrderSummaryCustomer(customerType);
    });

    // Обработчик изменения способа оплаты
    $(document).on('change', '._js-payment-type', function() {
        const paymentTitle = $(this).data('title');
        if (paymentTitle) {
            updateOrderSummaryPaymentType(paymentTitle);
        }
    });

    // Обработчик изменения типа доставки
    $(document).on('change', '._js-delivery-type', function() {
        const deliveryId = parseInt($(this).data('delivery-id'));
        const deliveryTitle = $(this).data('title');
        const $addressBlock = $('._js-delivery-address');
        
        // Обновляем блок итогов заказа
        if (deliveryTitle) {
            updateOrderSummaryDeliveryType(deliveryTitle);
        }
        
        // Константа из модели Delivery::DELIVERY_TO_ADDRESS = 2
        const DELIVERY_TO_ADDRESS = 2;

        if (deliveryId === DELIVERY_TO_ADDRESS) {
            // Показываем блок адреса для доставки на адрес (ID = 2)
            $addressBlock.slideDown(300);
            console.log('Показан блок адреса доставки');
        } else {
            // Скрываем блок адреса для других типов доставки
            $addressBlock.slideUp(300);
            console.log('Скрыт блок адреса доставки');
            
            // Очищаем поля адреса при скрытии
            $addressBlock.find('input[name="city"], input[name="street"], input[name="house"], input[name="block"], input[name="flat"], input[name="entrance"], input[name="floor"]').val('');
            $addressBlock.find('textarea[name="message"]').val('');
        }
    });

    // Инициализация состояния блока адреса при загрузке страницы заказа
    if (window.location.pathname === '/order/index') {
        setTimeout(function() {
            // Проверяем, выбран ли тип доставки с ID = 2
            const selectedDelivery = $('._js-delivery-type:checked');
            if (selectedDelivery.length > 0) {
                const deliveryId = parseInt(selectedDelivery.data('delivery-id'));
                const $addressBlock = $('._js-delivery-address');
                const DELIVERY_TO_ADDRESS = 2;
                
                if (deliveryId === DELIVERY_TO_ADDRESS) {
                    $addressBlock.show();
                    console.log('Инициализация: показан блок адреса доставки');
                } else {
                    $addressBlock.hide();
                    console.log('Инициализация: скрыт блок адреса доставки');
                }
            } else {
                // Если ни один тип доставки не выбран, скрываем блок адреса
                $('._js-delivery-address').hide();
            }
        }, 200);
    }

});
