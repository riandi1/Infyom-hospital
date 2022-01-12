$(document).ready(function () {
    'use strict';

    setTimeout(function () {
        $('#patientAdmissionId').val(patientAdmissionId);
        $('#patientAdmissionId').trigger('change');
    }, 500);
});