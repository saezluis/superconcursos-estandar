$(document).ready(function () {

    $('#voudoo-menu li').click(function () {

        // If any of the sub menus are showing....
        if ($(this).find('ul').is(':visible')) {
            $(this).find('ul').slideUp('fast');
        } else {
            $('#voudoo-menu li ul').slideUp('fast');
            $(this).find('ul').slideDown("fast", function () {
                // Animation complete.
            });

        }

    });

    $('#voudoo-menu-toggle').click(function () {
        $('#voudoo-menu').animate({ width: 'toggle' }, 300);
    });

});

