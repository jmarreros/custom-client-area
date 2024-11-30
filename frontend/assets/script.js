(function ($) {
    'use strict';

    // Register process ajax
    $('#customarea-register').submit(function (e) {
        e.preventDefault();

        const data = {
            email: $(this).find('#email').val(),
        }

        generic_ajax_call('#customarea-register', 'dcms_register_user', data);
    });


    // Login process ajax
    $('#customarea-login').submit(function (e) {
        e.preventDefault();

        const data = {
            username: $(this).find('#username').val(),
            password: $(this).find('#password').val(),
        }

        generic_ajax_call('#customarea-login', 'dcms_login_user', data);
    });

    // Save user data process ajax
    $('#customarea-data').submit(function (e) {
        e.preventDefault();

        // Loop all inputs, select and textarea in form and save values in data object

        let data = {};

        $(this).find('input, textarea, select').each(function() {
            let input = $(this);
            if ( input.attr('id')){
                if ( input.is(':checkbox') ){
                    data[input.attr('id')] = input.is(':checked') ? 1 : 0;
                }else {
                    data[input.attr('id')] = input.val();
                }
            }
        });

        generic_ajax_call('#customarea-data', 'dcms_save_data_emergency', data);
    });

    // Save data connection process ajax
    $('#customarea-data-connection').submit(function (e) {
        e.preventDefault();

        const data = {
            email: $(this).find('#email').val(),
            password: $(this).find('#password').val(),
            password2: $(this).find('#password2').val(),
        }

        generic_ajax_call('#customarea-data-connection', 'dcms_save_data_connection', data);
    });


    // Generic ajax call
    function generic_ajax_call(selector, action, data){

        const ldsRing = $(selector).find('.lds-ring');
        const message = $(selector).find('.form-message');
        const button = $(selector).find('.button');

        data['action'] = action;
        data['nonce'] = customarea_vars.nonce;

        $.ajax({
            url: customarea_vars.ajaxurl,
            type: 'post',
            data: data,
            beforeSend: function () {
                $(ldsRing).removeClass('hide');
                $(message).addClass('hide').removeClass('error');
                $(button).prop('disabled', true);
            }
        })
            .done(function (res) {
                console.log(res);
                $(message).removeClass('hide').html(res.message);
                if (!res.success) {
                    $(message).addClass('error');
                } else {
                    if ( res.url_redirect ){
                        window.location.href = res.url_redirect;
                    }
                }
            })
            .always(function () {
                $(ldsRing).addClass('hide');
                $(button).prop('disabled', false);
            });
    }

})(jQuery);