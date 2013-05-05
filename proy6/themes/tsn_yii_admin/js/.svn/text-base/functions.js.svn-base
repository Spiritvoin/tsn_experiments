//menu open
jQuery(document).ready(function ($) {
    $('a[href="' + window.location.pathname + '"]').parents('li.limenu').addClass('select');


    var item = $('#sortable1').children();

    $('#sortable1').on("sortbeforestop", function (event, ui) {
        ui.item.parent().children().first().removeClass('menu-dept_1')

        // ui.item.parent().children().first().next().removeClass('menu-dept-2')

        if (!$.isEmptyObject(ui.position)) {
            var position = ui.position.left
            if (position >= 270 && position <= 350)
                ui.item.removeClass().addClass('menu-dept_1')

            if (position >= 370 && position <= 450 && (ui.item.prev().hasClass('menu-dept_1') || ui.item.prev().hasClass('menu-dept_2')  ))
                ui.item.removeClass('menu-dept_1').addClass('menu-dept_2')

            if (position <= 250)
                ui.item.removeClass().addClass('menu-dept_0')
        }


    })


    setTimeout(function () {
        $('#sflash').hide();
    }, 4000);


});
