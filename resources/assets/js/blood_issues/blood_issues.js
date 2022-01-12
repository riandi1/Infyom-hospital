'use strict';

let tbl = $('#bloodIssuesTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: bloodIssueUrl,
    },
    columnDefs: [
        {
            'targets': [6],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [5],
            'className': 'text-right',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.issue_date === null) {
                    return 'N/A';
                }

                return moment(row.issue_date).
                    format('Do MMM, Y h:mm A');
            },
            name: 'issue_date',
        },
        {
            data: 'doctor.user.full_name',
            name: 'doctor.user.first_name',
        },
        {
            data: 'patient.user.full_name',
            name: 'patient.user.first_name',
        },
        {
            data: 'blooddonor.name',
            name: 'blooddonor.name',
        },
        {
            data: 'blooddonor.blood_group',
            name: 'blooddonor.blood_group',
        },
        {
            data: function data (row) {
                return !isEmpty(row.amount) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' + addCommas(row.amount) +
                    '</p>' : 'N/A';
            }, name: 'amount',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#bloodIssueActionTemplate', data);
            }, name: 'patient.user.last_name',
        },
    ],
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: bloodIssueCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#bloodIssuesTable').DataTable().ajax.reload(null, false);
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

$('#donorName').on('change', function () {
    changeBloodGroup('#bloodGroup', $(this).val());
});
$('#editDonorName').on('change', function () {
    changeBloodGroup('#editBloodGroup', $(this).val());
});

window.changeBloodGroup = function (selector, id) {
    $.ajax({
        url: bloodGroupUrl,
        type: 'get',
        dataType: 'json',
        data: { id: id },
        success: function (data) {
            $(selector).empty();
            $.each(data.data, function (i, v) {
                $(selector).
                    append($('<option></option>').attr('value', i).text(v));
            });
        },
    });
};

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    let id = $('#bloodIssueId').val();
    $.ajax({
        url: bloodIssueUrl + '/' + id,
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#bloodIssuesTable').DataTable().ajax.reload(null, false);
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

$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

window.renderData = function (id) {
    $.ajax({
        url: bloodIssueUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let bloodIssue = result.data;
                $('#bloodIssueId').val(bloodIssue.id);
                $('#editIssueDate').
                    val(moment(bloodIssue.issue_date).
                        format('YYYY-MM-DD HH:mm:ss'));
                $('#editDoctorName').
                    val(bloodIssue.doctor_id).
                    trigger('change');
                $('#editPatientName').
                    val(bloodIssue.patient_id).
                    trigger('change');
                $('#editDonorName').
                    val(bloodIssue.donor_id).
                    trigger('change', [{ isEdit: true }]);
                $('#editAmount').val(bloodIssue.amount);
                $('.price-input').trigger('input');
                $('#editRemarks').val(bloodIssue.remarks);
                $('#editModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let bloodIssueId = $(event.currentTarget).data('id');
    renderData(bloodIssueId);
});

$(document).on('click', '.delete-btn', function (event) {
    let bloodIssueId = $(event.currentTarget).data('id');
    deleteItem(
        bloodIssueUrl + '/' + bloodIssueId,
        '#bloodIssuesTable',
        'Blood Issue',
    );
});

$(document).ready(function () {
    $('#doctorName,#patientName,#donorName,#bloodGroup,#editDoctorName,#editPatientName,#editDonorName,#editBloodGroup').
        select2({
            width: '100%',
        });
    $('#issueDate,#editIssueDate').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            maxDate: new Date(),
        }));
});
