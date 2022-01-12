$(document).ready(function () {
    'use strict';

    $('#accountId').select2({
        width: '100%',
    });
    $('#paymentDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
    }));
    $('select').focus();

    $('.price-input').trigger('input');
});
