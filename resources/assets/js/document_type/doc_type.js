'use strict';
let tableName = '#tblDocTypes';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: docTypeUrl,
    },
    columnDefs: [
        {
            'targets': [1],
            'orderable': false,
            'className': 'text-center',
            'width': '6%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = docTypeUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name + '</a>';
            },
            name: 'name',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#docTypeActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let id = $(event.currentTarget).data('id');
    deleteItem(docTypeUrl + '/' + id, tableName, 'Document Type');
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    let data = {
        'formSelector': $(this),
        'url': docTypeCreateUrl,
        'type': 'POST',
        'tableSelector': tableName,
    };
    newRecord(data, loadingButton);
});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let docTypeId = $(event.currentTarget).data('id');
    renderData(docTypeId);
});

window.renderData = function (id) {
    $.ajax({
        url: docTypeUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#docTypeId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#EditModal').modal('show');
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
    let id = $('#docTypeId').val();
    let url = docTypeUrl + '/' + id;
    let data = {
        'formSelector': $(this),
        'url': url,
        'type': 'PUT',
        'tableSelector': tableName,
    };
    editRecordWithForm(data, loadingButton);
});
