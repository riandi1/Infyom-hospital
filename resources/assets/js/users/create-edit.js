'use strict';

$(document).ready(function () {
    $('#createUserForm', '#editUserForm').submit(function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    });

    $('#createUserForm, #editUserForm').
        on('keyup keypress', function (e) {
            let keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

    $('#birthDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        maxDate: new Date(),
    }));

    $(document).ready(function () {
        $('#role').
            select2({
                width: '100%',
            });
    });

    $(document).on('change', '#profileImage', function () {
        let extension = isValidDocument($(this), '#userValidationErrorsBox');
        if (!isEmpty(extension) && extension != false) {
            $('#userValidationErrorsBox').html('').hide();
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
                    'The profile image must be a file of type: jpeg, jpg, png.').
                removeClass('display-none').show();

            setTimeout(function () {
                $(validationMessageSelector).slideUp(300);
            }, 5000);

            return false;
        }
        $(validationMessageSelector).addClass('display-none');

        return ext;
    };

    $(document).
        on('submit', '#createUserForm, #editUserForm', function () {
            $('#btnSave').attr('disabled', true);
        });
});
