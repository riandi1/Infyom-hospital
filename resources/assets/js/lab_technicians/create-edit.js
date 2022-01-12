$(document).ready(function () {
    'use strict';

    $('#bloodGroup').select2({
        width: '100%',
    });
    $('#departmentId').select2({
        width: '100%',
    });
    $('#birthDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        maxDate: new Date(),
    }));

    $('#createLabTechnicianForm, #editLabTechnicianForm').submit(function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    });
    $('#createLabTechnicianForm, #editLabTechnicianForm').
        find('input:text:visible:first').
        focus();
});
