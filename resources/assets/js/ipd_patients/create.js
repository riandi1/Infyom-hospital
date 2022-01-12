'use strict';

$(document).ready(function () {
    $('#patientId, #caseId, #doctorId, #bedTypeId, #bedId').select2({
        width: '100%',
    });
    $('#admissionDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: true,
        sideBySide: true,
    }));

    if (isEdit) {
        $('#patientId, #bedTypeId').trigger('change');
        $('#admissionDate').
            data('DateTimePicker').
            minDate($('#admissionDate').val());
    } else
        $('#admissionDate').data('DateTimePicker').minDate(new Date());

    $('.floatNumber').keyup(function () {
        if ($(this).val().indexOf('.') != -1) {
            if ($(this).val().split('.')[1].length > 2) {
                if (isNaN(parseFloat(this.value))) return;
                this.value = parseFloat(this.value).toFixed(2);
            }
        }
        return this;
    });

    $('#createIpdPatientForm, #editIpdPatientDepartmentForm').
        submit(function () {
            $('#btnSave').attr('disabled', true);
        });
});

$('#patientId').on('change', function () {
    if ($(this).val() !== '') {
        $.ajax({
            url: patientCasesUrl,
            type: 'get',
            dataType: 'json',
            data: { id: $(this).val() },
            success: function (data) {
                if (data.data.length !== 0) {
                    $('#caseId').empty();
                    $('#caseId').removeAttr('disabled');
                    $.each(data.data, function (i, v) {
                        $('#caseId').
                            append($('<option></option>').
                                attr('value', i).
                                text(v));
                    });
                } else {
                    $('#caseId').prop('disabled', true);
                }
            },
        });
    }
    $('#caseId').empty();
    $('#caseId').prop('disabled', true);
});

$('#bedTypeId').on('change', function () {
    let bedId = null;
    let bedTypeId = null;
    if (typeof ipdPatientBedId != 'undefined' && typeof ipdPatientBedTypeId !=
        'undefined') {
        bedId = ipdPatientBedId;
        bedTypeId = ipdPatientBedTypeId;
    }

    if ($(this).val() !== '') {
        let bedType = $(this).val();
        $.ajax({
            url: patientBedsUrl,
            type: 'get',
            dataType: 'json',
            data: {
                id: $(this).val(),
                isEdit: isEdit,
                bedId: bedId,
                ipdPatientBedTypeId: bedTypeId,
            },
            success: function (data) {
                if (data.data !== null) {
                    if (data.data.length !== 0) {
                        $('#bedId').empty();
                        $('#bedId').removeAttr('disabled');
                        $.each(data.data, function (i, v) {
                            $('#bedId').
                                append($('<option></option>').
                                    attr('value', i).
                                    text(v));
                        });
                        if (typeof ipdPatientBedId != 'undefined' &&
                            typeof ipdPatientBedTypeId != 'undefined') {
                            if (bedType === ipdPatientBedTypeId) {
                                $('#bedId').
                                    val(ipdPatientBedId).
                                    trigger('change.select2');
                            }
                        }
                        $('#bedId').prop('required', true);
                    }
                } else {
                    $('#bedId').prop('disabled', true);
                }
            },
        });
    }
    $('#bedId').empty();
    $('#bedId').prop('disabled', true);
});
