'use strict';

$(document).ready(function () {
    $('#createCallLogForm, #editCallLogForm').submit(function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    });

    $('#createCallLogForm, #editCallLogForm').
        on('keyup keypress', function (e) {
            let keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

    if (isEdit) {
        $('#date').datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
        }));
    } else {
        $('#date').datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
            minDate: moment(new Date()).format('YYYY-MM-DD'),
        }));
    }
    $('#followUpDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        minDate: moment(new Date()).format('YYYY-MM-DD'),
    }));
    $('#date').on('dp.change', function (e) {
        $('#followUpDate').data('DateTimePicker').minDate(e.date);
    });
    $(document).
        on('submit', '#createCallLogForm, #editCallLogForm', function () {
            $('#btnSave').attr('disabled', true);
        });
});
