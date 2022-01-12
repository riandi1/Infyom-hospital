'use strict';

let tbl = $('#vaccinatedPatientTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: vaccinatedPatientUrl,
    },
    columnDefs: [
        {
            'targets': [5],
            'className': 'text-center',
            'orderable': false,
            'width': '8%',
        },
        {
            'targets': [3],
            'className': 'text-center',
            'width': '8%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = patientUrl + '/' + row.patient.id;
                return '<a href="' + showLink + '">' +
                    row.patient.user.full_name + '</a>';
            },
            name: 'patient.user.first_name',
        },
        {
            data: 'vaccination.name',
            name: 'vaccination.name',
        },
        {
            data: 'vaccination_serial_number',
            name: 'vaccination_serial_number',
        },
        {
            data: 'dose_number',
            name: 'dose_number',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.dose_given_date === null) {
                    return 'N/A';
                }

                return moment(row.dose_given_date).
                    utc().
                    format('Do MMM, Y h:mm A');
            },
            name: 'dose_given_date',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender(
                    '#vaccinationPatientsActionTemplate',
                    data);
            }, name: 'patient.user.last_name',
        },
    ],
});

$(document).ready(function () {
    $('#patientName,#vaccinationName,#editPatientName,#editVaccinationName').
        select2({
            width: '100%',
        });

    $('#editDoesGivenDate').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            maxDate: new Date(),
        }));

    $('#doesGivenDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: true,
        sideBySide: true,
        maxDate: moment().endOf('day'),
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom',
        },
    }));
});

$('#addModal').on('shown.bs.modal', function () {
    $('#doesGivenDate').val(moment().format('YYYY-MM-DD HH:mm:ss'));
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: vaccinatedPatientCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#vaccinatedPatientTable').
                    DataTable().
                    ajax.
                    reload(null, false);
                setTimeout(function () {
                    loadingButton.button('reset');
                }, 2500);
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result);
            setTimeout(function () {
                loadingButton.button('reset');
            }, 2000);
        },
    });
});

$('#addModal').on('hidden.bs.modal', function () {
    $('#patientName').val('').trigger('change');
    $('#vaccinationName').val('').trigger('change');
    $('#doesGivenDate').data('DateTimePicker').date(null);
    resetModalForm('#addNewForm', '#validationErrorsBox');
});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let vaccinatedPatientId = $(event.currentTarget).attr('data-id');
    renderData(vaccinatedPatientId);
});

window.renderData = function (id) {
    $.ajax({
        url: vaccinatedPatientUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let vaccinatedPatient = result.data;
                $('#vaccinatedPatientId').val(vaccinatedPatient.id);
                $('#editPatientName').
                    val(vaccinatedPatient.patient_id).
                    trigger('change.select2');
                $('#editVaccinationName').
                    val(vaccinatedPatient.vaccination_id).
                    trigger('change.select2');
                $('#editSerialNo').
                    val(vaccinatedPatient.vaccination_serial_number);
                $('#editDoseNumber').val(vaccinatedPatient.dose_number);
                $('#editDoesGivenDate').
                    val(moment(vaccinatedPatient.dose_given_date).
                        utc().
                        format('YYYY-MM-DD HH:mm:ss'));
                $('#editDescription').val(vaccinatedPatient.description);
                $('#editModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#editBtnSave');
    loadingButton.button('loading');
    let id = $('#vaccinatedPatientId').val();
    $.ajax({
        url: vaccinatedPatientUrl + '/' + id + '/update',
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#vaccinatedPatientTable').
                    DataTable().
                    ajax.
                    reload(null, false);
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

$(document).on('click', '.delete-btn', function (event) {
    let vaccinatedPatientId = $(event.currentTarget).data('id');
    deleteItem(vaccinatedPatientUrl + '/' + vaccinatedPatientId,
        '#vaccinatedPatientTable', 'Vaccinated Patient');
});
