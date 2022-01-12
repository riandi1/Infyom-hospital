$(document).ready(function () {
    'use strict';

    $('#vehicleType').select2({
        width: '100%',
    });

    $('#createAmbulanceForm, #editAmbulanceForm').submit(function () {
        $('#btnSave').attr('disabled', true);

        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            $('#btnSave').attr('disabled', false);
            return false;
        }
    });

    $('#createAmbulanceForm, #editAmbulanceForm').
        find('input:text:visible:first').
        focus();

    $(document).
        on('submit', '#createAmbulanceForm, #editAmbulanceForm', function () {
            $('#btnSave').attr('disabled', true);
        });
});
