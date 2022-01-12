$(document).ready(function () {
    'use strict';

    $('#patientId, #doctorId').select2({
        width: '100%',
    });
    $('#date').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: true,
        sideBySide: true,
        minDate: moment(new Date()).format('YYYY-MM-DD'),
    }));
    $('#patientId').focus();

    $('.price-input').trigger('input');

    $('#createPatientCaseForm, #editPatientCaseForm').submit(function () {
        $('#saveBtn').attr('disabled', true);

        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            $('#saveBtn').attr('disabled', false);
            return false;
        }
    });
});
