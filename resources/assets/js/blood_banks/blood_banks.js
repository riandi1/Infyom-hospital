'use strict';

let tbl = $('#bloodBankTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'desc']],
    ajax: {
        url: bloodBankUrl,
    },
    columnDefs: [
        {
            'targets': [2],
            'orderable': false,
            'className': 'text-center',
            'width': '5%',
        },
        {
            'targets': [0],
            'className': 'text-left',
            'width': '30%',
        },
        {
            'targets': [1],
            'className': 'text-right',
            'width': '30%',
        },
        {
            'targets': [0, 1],
            'width': '30%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: 'blood_group',
            name: 'blood_group',
        },
        {
            data: 'remained_bags',
            name: 'remained_bags',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#bloodBankActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: bloodBankCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#bloodBankTable').DataTable().ajax.reload(null, false);
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

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    var id = $('#bloodBankId').val();
    $.ajax({
        url: bloodBankUrl + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#bloodBankTable').DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
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
        url: bloodBankUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let bloodGroup = result.data;
                $('#bloodBankId').val(bloodGroup.id);
                $('#editBloodGroup').val(bloodGroup.blood_group);
                $('#editRemainedBags').val(bloodGroup.remained_bags);
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
    let bloodGroupId = $(event.currentTarget).data('id');
    renderData(bloodGroupId);
});

$(document).on('click', '.delete-btn', function (event) {
    let bloodGroupId = $(event.currentTarget).data('id');
    deleteItem(bloodBankUrl + '/' + bloodGroupId, '#bloodBankTable',
        'Blood Group');
});
