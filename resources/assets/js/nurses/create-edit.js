$(document).ready(function () {
    'use strict';

    $('#bloodGroup').select2({
        width: '100%',
    });
    $('#birthDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        maxDate: new Date(),
    }));
    $('#departmentId').select2({
        width: '100%',
    });

    $('#createNurseForm, #editNurseForm').submit(function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    });
    $('#createNurseForm, #editNurseForm').
        find('input:text:visible:first').
        focus();
});
