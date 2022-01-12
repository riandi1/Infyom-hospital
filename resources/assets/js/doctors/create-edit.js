'use strict';

$(document).ready(function () {
    $('#bloodGroup').select2({
        width: '100%',
    });
    $('#departmentId,#doctorDepartmentId').select2({
        width: '100%',
    });
    $('#birthDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        maxDate: new Date(),
    }));

    $('#createDoctorForm, #editDoctorForm').submit(function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    });
    $('#createDoctorForm, #editDoctorForm').
        find('input:text:visible:first').
        focus();
});
