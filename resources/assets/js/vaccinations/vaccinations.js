'use strict';

let tbl = $('#vaccinationsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: vaccinationUrl,
    },
    columnDefs: [
        {
            'targets': [3],
            'className': 'text-center',
            'orderable': false,
            'width': '8%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: 'name',
            name: 'name',
        },
        {
            data: 'manufactured_by',
            name: 'manufactured_by',
        },
        {
            data: 'brand',
            name: 'brand',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#vaccinationActionTemplate',
                    data);
            }, name: 'name',
        },
    ],
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: vaccinationCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#vaccinationsTable').DataTable().ajax.reload(null, false);
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
    resetModalForm('#addNewForm', '#validationErrorsBox');
});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let vaccinationId = $(event.currentTarget).attr('data-id');
    renderData(vaccinationId);
});

window.renderData = function (id) {
    $.ajax({
        url: vaccinationUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let vaccinatation = result.data;
                $('#vaccinationId').val(vaccinatation.id);
                $('#editName').val(vaccinatation.name);
                $('#editManufacturedBy').val(vaccinatation.manufactured_by);
                $('#editBrand').val(vaccinatation.brand);
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
    let loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    let id = $('#vaccinationId').val();
    $.ajax({
        url: vaccinationUrl + '/' + id + '/update',
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#vaccinationsTable').DataTable().ajax.reload(null, false);
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
    let vaccinationId = $(event.currentTarget).data('id');
    deleteItem(vaccinationUrl + '/' + vaccinationId, '#vaccinationsTable',
        'Vaccination');
});
