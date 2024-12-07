(function ($) {
    'use strict';

    $('.action-no-approval').on('click', function (e) {
        e.preventDefault();
        if (confirm('¿Estas seguro que quieres rechazar este usuario?')) {
            window.location.href = $(this).attr('href');
        }
    });

    $('.action-pending').on('click', function (e) {
        e.preventDefault();
        if (confirm('¿Estas seguro que quieres poner pendiente este usuario?')) {
            window.location.href = $(this).attr('href');
        }
    });


})(jQuery);