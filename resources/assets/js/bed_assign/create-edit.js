$(document).ready(function () {
    'use strict';

    $('#caseId, #bedId, #ipdPatientId').select2({
        width: '100%',
    });
    $('#assignDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: true,
        sideBySide: true,
    }));
    $('#caseId').first().focus();

    if (isEdit) {
        setTimeout(function () {
            $('#caseId').trigger('change');
            $('#assignDate').trigger('dp.change');
        }, 300);

        let minDate = moment($('#assignDate').val()).add(1, 'days');
        $('#assignDate').on('dp.change', function (e) {
            $('#dischargeDate').datetimepicker(DatetimepickerDefaults({
                format: 'YYYY-MM-DD HH:mm:ss',
                sideBySide: true,
                minDate: minDate,
                useCurrent: false,
            }));
        });
    }

    $('#createBedAssign, #editBedAssign').on('submit', function () {
        $('#saveBtn').attr('disabled', true);
        if ($('#validationErrorsBox').text() !== '') {
            $('#saveBtn').attr('disabled', false);
        }
    });

    $('#caseId').on('change', function () {
        if ($(this).val() !== '') {
            $.ajax({
                url: ipdPatientsList,
                type: 'get',
                dataType: 'json',
                data: { id: $(this).val() },
                success: function (data) {
                    if (data.data.length !== 0) {
                        $('#ipdPatientId').empty();
                        $('#ipdPatientId').removeAttr('disabled');
                        $.each(data.data, function (i, v) {
                            $('#ipdPatientId').
                                append($('<option></option>').
                                    attr('value', i).
                                    text(v));
                        });
                    } else {
                        $('#ipdPatientId').prop('disabled', true);
                    }
                },
            });
        }
        $('#ipdPatientId').empty();
        $('#ipdPatientId').prop('disabled', true);
    });
});
