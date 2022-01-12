'use strict';

$('#addModal, #editModal').on('shown.bs.modal', function () {
    $('#name, #editName:first').focus();
});

let tbl = $('#diagnosisCategoryTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: diagnosisCategoryUrl,
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
            data: function (row) {
                let showLink = diagnosisCategoryUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name + '</a>';
            },
            name: 'name',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#diagnosisCategoryActionTemplate',
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
        url: diagnosisCategoryCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                tbl.ajax.reload(null, false);
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

$(document).on('click', '.delete-btn', function (event) {
    let diagnosisCategoryId = $(event.currentTarget).data('id');
    deleteItem(diagnosisCategoryUrl + '/' + diagnosisCategoryId,
        '#diagnosisCategoryTable',
        'Diagnosis Category');
});

$(document).on('click', '.edit-btn', function (event) {
    let diagnosisCategoryId = $(event.currentTarget).data('id');
    renderData(diagnosisCategoryId);
});

window.renderData = function (id) {
    $.ajax({
        url: diagnosisCategoryUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#diagnosisCategoryId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editDescription').val(result.data.description);
                $('#editModal').modal('show');
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
    var id = $('#diagnosisCategoryId').val();
    $.ajax({
        url: diagnosisCategoryUrl + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                tbl.ajax.reload(null, false);
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
