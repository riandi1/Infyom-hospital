$('#admissionDate').datetimepicker(DatetimepickerDefaults({
    format: 'YYYY-MM-DD HH:mm:ss',
    useCurrent: true,
    sideBySide: true,
}));

$(document).ready(function () {
    'use strict';

    $('#patientId, #doctorId, #packageId, #insuranceId, #bedId').select2({
        width: '100%',
    });

    $('#patientId').focus();

    if (isEdit) {
        setTimeout(function () {
            $('#admissionDate').trigger('dp.change');
        }, 300);

        let minDate = moment($('#admissionDate').val()).add(1, 'days');
        $('#admissionDate').on('dp.change', function (e) {
            $('#dischargeDate').datetimepicker(DatetimepickerDefaults({
                format: 'YYYY-MM-DD HH:mm:ss',
                sideBySide: true,
                minDate: minDate,
                useCurrent: false,
            }));
        });
    }

    $('#createPatientAdmission, #editPatientAdmission').submit(function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    });
});
