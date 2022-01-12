'use strict';

window.newRecord = function (data, loadingButton, modalSelector = '#AddModal') {
    let formData = (data.formSelector === '') ? data.formData : new FormData(
        $(data.formSelector)[0]);

    $.ajax({
        url: data.url,
        type: data.type,
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(modalSelector).modal('hide');
                $(data.tableSelector).DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            printErrorMessage("#validationErrorsBox", result);
        },
        complete: function () {
            loadingButton.button('reset');
        }
    });
};
window.editRecord = function (
    data, loadingButton, modalSelector = '#EditModal',
    btnToDisabledSelector = '') {
    let formData = (data.formSelector === '') ? data.formData : new FormData(
        $(data.formSelector)[0]);
    $.ajax({
        url: data.url,
        type: data.type,
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(modalSelector).modal('hide');
                $(data.tableSelector).DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
        },
        complete: function () {
            loadingButton.button('reset');
            $(btnToDisabledSelector).attr('disabled', true);
        }
    });
};
window.editRecordWithForm = function (data, loadingButton) {
    let formData = (data.formSelector === '') ? data.formData : $(data.formSelector).serialize();
    $.ajax({
        url: data.url,
        type: data.type,
        data: formData,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#EditModal').modal('hide');
                $(data.tableSelector).DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
        },
        complete: function () {
            loadingButton.button('reset');
        }
    });
};
