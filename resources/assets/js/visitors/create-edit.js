'use strict';

$(document).ready(function () {
    $('#createVisitorForm, #editVisitorForm').submit(function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    });

    $('#createVisitorForm, #editVisitorForm').
        on('keyup keypress', function (e) {
            let keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

    $('#date').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
    }));

    $('#inTime,#outTime').
        datetimepicker(DatetimepickerDefaults({
            format: 'HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom',
            },
        }));
    $('#outTime').datetimepicker(DatetimepickerDefaults({
        format: 'HH:mm:ss',
        useCurrent: true,
        sideBySide: true,
        minDate: moment(new Date()).format('HH:mm:ss'),
    }));
    $('#inTime').on('dp.change', function (e) {
        $('#outTime').data('DateTimePicker').minDate(e.date);
    });

    $(document).ready(function () {
        $('#purpose').
            select2({
                width: '100%',
            });
    });

    $(document).on('change', '#attachment', function () {
        let extension = isValidDocument($(this), '#visitorValidationErrorsBox');
        if (!isEmpty(extension) && extension != false) {
            $('#validationErrorsBox').html('').hide();
            displayDocument(this, '#previewImage', extension);
        }
    });

    window.isValidDocument = function (
        inputSelector, validationMessageSelector) {
        let ext = $(inputSelector).val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx']) ==
            -1) {
            $(inputSelector).val('');
            $(validationMessageSelector).
                html(
                    'The document must be a file of type: jpeg, jpg, png, pdf, doc, docx.').
                removeClass('display-none');

            return false;
        }
        $(validationMessageSelector).addClass('display-none');

        return ext;
    };

    $(document).
        on('submit', '#createVisitorForm, #editVisitorForm', function () {
            $('#btnSave').attr('disabled', true);
        });
});
