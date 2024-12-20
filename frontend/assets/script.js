(function ($) {
    'use strict';

    $('#affiliation-form').submit(function (e) {
        e.preventDefault();

        let formData = {};

        // Loop through all input, select elements in the form
        $(this).find('input, select').each(function () {
            let input = $(this);
            let name = input.attr('name');

            if (name) {
                if (input.is(':radio')) {
                    if (input.is(':checked')) {
                        formData[name] = input.val();
                    }
                } else {
                    formData[name] = input.val();
                }
            }


        });

        console.log(formData);

        generic_ajax_call('#affiliation-form', 'dcms_save_affiliation', formData);
    });

    // Register process ajax
    $('#customarea-register').submit(function (e) {
        e.preventDefault();

        const data = {
            username: $(this).find('#username').val(),
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

        $(this).find('input, textarea, select').each(function () {
            let input = $(this);
            if (input.attr('id')) {
                if (input.is(':checkbox')) {
                    data[input.attr('id')] = input.is(':checked') ? 1 : 0;
                } else {
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
    function generic_ajax_call(selector, action, data) {

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
                $(message).removeClass('hide').html(res.message);
                if (!res.success) {
                    $(message).addClass('error');
                } else {
                    if (res.url_redirect) {
                        window.location.href = res.url_redirect;
                    }
                }
            })
            .always(function () {
                $(ldsRing).addClass('hide');
                $(button).prop('disabled', false);
            });
    }


    // Show hide controls affiliation form

    // Centro de trabajo 1 y 2

    $('.affiliation-form #centro-trabajo-1-tipo').change(function () {
        if ($(this).val() === 'publico') {
            $('.affiliation-form #centro-trabajo-1').attr('list', 'centro-trabajo-1-options');
        }
        if ($(this).val() === 'privado' || $(this).val() === 'otros') {
            $('.affiliation-form #centro-trabajo-1').removeAttr('list');
        }
    });

    $('.affiliation-form #centro-trabajo-2-tipo').change(function () {
        if ($(this).val() === 'publico') {
            $('.affiliation-form #centro-trabajo-2').attr('list', 'centro-trabajo-2-options');
        }
        if ($(this).val() === 'privado' || $(this).val() === 'otros') {
            $('.affiliation-form #centro-trabajo-2').removeAttr('list');
        }
    });

    // Ejercicio profesional
    $('.affiliation-form #ejercicio-profesional').change(function () {
        if ($(this).val() === 'publico') {
            $('.affiliation-form .public-group').removeClass('hide');
            $('.affiliation-form .private-group').addClass('hide');
        }
        if ($(this).val() === 'privado') {
            $('.affiliation-form .private-group').removeClass('hide');
            $('.affiliation-form .public-group').addClass('hide');
        }
        if ($(this).val() === 'ambos') {
            $('.affiliation-form .public-group').removeClass('hide');
            $('.affiliation-form .private-group').removeClass('hide');
        }
    });

    $('.affiliation-form #publico-grupo-profesional').change(function () {
        if ($(this).val() === 'estatuario' || $(this).val() === 'funcionario') {
            $('.affiliation-form #publico-contrato').attr('list', 'publico-contrato-options');
        } else {
            $('.affiliation-form #publico-contrato').attr('list', 'publico-contrato-options-alt');
        }
    });


    $('.affiliation-form #privado-grupo-profesional').change(function () {
        if ($(this).val() === 'laboral') {
            $('.affiliation-form #privado-contrato').attr('list', 'privado-contrato-options');
        } else {
            $('.affiliation-form #privado-contrato').attr('list', '');
        }
    });

    // hide the last child form-grup class
    $('.affiliation-form .situation .form-group:last-child').addClass('hide');
    $('.affiliation-form #situacion-administrativa').change(function () {
        if ($(this).val() === 'excedencia' || $(this).val() === 'servicios especiales') {
            $('.affiliation-form .situation .form-group:last-child').removeClass('hide');
        } else {
            $('.affiliation-form .situation .form-group:last-child').addClass('hide');
        }
    });

})(jQuery);