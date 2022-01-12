$(document).ready(function () {
    'use strict';

    $('#bloodGroup').select2({
        width: '100%',
    });
});
$('#birthDate').datetimepicker(DatetimepickerDefaults({
    format: 'YYYY-MM-DD',
    useCurrent: true,
    sideBySide: true,
    maxDate: new Date(),
}));

$('#createCaseHandlerForm, #editCaseHandlerForm').submit(function () {
    if ($('#error-msg').text() !== '') {
        $('#phoneNumber').focus();
        return false;
    }
});
$('#createCaseHandlerForm, #editCaseHandlerForm').
    find('input:text:visible:first').
    focus();
