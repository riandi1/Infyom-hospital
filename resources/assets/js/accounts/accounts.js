'use strict';

$('#filter_status, #filter_type').select2();

let tableName = '#accountsTbl';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: accountUrl,
        data: function (data) {
            data.account_status = $('#filter_status').
                find('option:selected').
                val();
            data.account_type = $('#filter_type').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [2, 3],
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
                let showLink = accountUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name +
                    '</a>';
            },
            name: 'name',
        },
        {
            data: 'type_label',
            name: 'type',
        },
        {
            data: function (row) {
                let checked = row.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#accountIsActiveTemplate', data);
            },
            name: 'status',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#accountActionTemplate', data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status, #filter_type').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('change', '.is-active', function (event) {
    let accountId = $(event.currentTarget).data('id');
    updateStatus(accountId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: accountUrl + '/' +  + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                $(tableName).DataTable().ajax.reload(null, false);
            }
        },
    });
};

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    let data = {
        'formSelector': $(this),
        'url': accountCreateUrl,
        'type': 'POST',
        'tableSelector': tableName,
    };
    newRecord(data, loadingButton);
});

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    let id = $('#accountId').val();
    let url = accountUrl + '/' +  + id;
    let data = {
        'formSelector': $(this),
        'url': url,
        'type': 'PUT',
        'tableSelector': tableName,
    };
    editRecordWithForm(data, loadingButton);
});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let accountId = $(event.currentTarget).data('id');
    renderData(accountId);
});

$(document).on('click', '.delete-btn', function (event) {
    let id = $(event.currentTarget).data('id');
    deleteItem(accountUrl + '/' +  + id, tableName, 'Account');
});

window.renderData = function (id) {
    $.ajax({
        url: accountUrl + '/' +  + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#accountId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editDescription').val(result.data.description);
                if (result.data.status) {
                    $('#editIsActive').val(1).prop('checked', true);
                }
                if (result.data.type == 1) {
                    $('#editDebit').prop('checked', true);
                } else {
                    $('#editCredit').prop('checked', true);
                }
                $('#EditModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};
