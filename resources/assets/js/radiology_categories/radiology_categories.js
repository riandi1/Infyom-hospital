'use strict';

let tableName = '#radiologyCategoryTable';
let tbl = $('#radiologyCategoryTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: radiologyCategoryUrl,
    },
    columnDefs: [
        {
            'targets': [1],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: 'name',
            name: 'name',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#radiologyCategoryActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: radiologyCategoryCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#radiologyCategoryTable').
                    DataTable().
                    ajax.
                    reload(null, true);
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
    var id = $('#radiologyCategoryId').val();
    $.ajax({
        url: radiologyCategoryUrl + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#radiologyCategoryTable').
                    DataTable().
                    ajax.
                    reload(null, true);
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
        url: radiologyCategoryUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let radiologyCategory = result.data;
                $('#radiologyCategoryId').val(radiologyCategory.id);
                $('#editName').val(radiologyCategory.name);
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
    let radiologyCategoryId = $(event.currentTarget).data('id');
    renderData(radiologyCategoryId);
});

$(document).on('click', '.delete-btn', function (event) {
    let radiologyCategoryId = $(event.currentTarget).data('id');
    deleteItem(radiologyCategoryUrl + '/' + radiologyCategoryId,
        '#radiologyCategoryTable', 'Radiology Category');
});
