'use strict';

$(document).ready(function () {
    var $block = $('.no-results');

    $('#searchText').on('keyup', function () {
        let searchText = $(this).val();
        var isMatch = false;

        let value = this.value.toLowerCase().trim();
        $('.close-sign').click(function () {
            $('#searchText').val('');
            $('.side-menus').show().filter(function () {
                if (searchText != '') {
                    $(this).removeClass('open');
                }
            });
            $('.close-sign').hide();
            $('.no-results').css('display', 'none');
        });

        $('.side-menus').show().filter(function () {
            $(this).addClass('open');
            if (searchText == '') {
                $(this).removeClass('open');
                $('.close-sign').hide();
            }
            if ($(this).text().toLowerCase().trim().indexOf(value) == -1) {
                $(this).hide();
                $('.close-sign').show();
            } else {
                isMatch = true;
                $(this).show();
            }
        });
        $block.toggle(!isMatch);
    });
});
