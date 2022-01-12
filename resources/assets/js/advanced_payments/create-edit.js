$(document).ready(function () {
    'use strict';

    $('#patientId,#editPatientId').select2({
        width: '100%',
    });
    $('#date, #editDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        minDate: moment(),
    }));
    $('#addModal, #editModal').on('shown.bs.modal', function () {
        $('#patientId, #editPatientId:first').focus();
    });
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: advancePaymentCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#advancedPaymentsTable').
                    DataTable().
                    ajax.
                    reload(null, false);
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let advancedPaymentId = $(event.currentTarget).data('id');
    renderData(advancedPaymentId);
});

window.renderData = function (id) {
    $.ajax({
        url: advancedPaymentUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#advancePaymentId').val(result.data.id);
                $('#editPatientId').
                    val(result.data.patient_id).
                    trigger('change.select2');
                $('#editReceiptNo').val(result.data.receipt_no);
                $('#editAmount').val(result.data.amount);
                $('.price-input').trigger('input');
                $('#editDate').val(format(result.data.date, 'YYYY-MM-DD'));
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
    var loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    let id = $('#advancePaymentId').val();
    $.ajax({
        url: advancedPaymentUrl + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#advancedPaymentsTable').
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

$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
    $('#patientId').val('').trigger('change.select2');
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});
