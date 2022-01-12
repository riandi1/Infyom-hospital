'use strict';

let tableName = '#categoriesTable';
let tbl = $('#categoriesTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: categoriesUrl,
        data: function (data) {
            data.is_active = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [2],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [1],
            'orderable': false,
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
                let showLink = categoriesUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name +
                    '</a>';
            },
            name: 'name',
        },
        {
            data: function (row) {
                let checked = row.is_active === 0 ? '' : 'checked';
                let data = [{'id': row.id, 'checked' : checked }];
                return prepareTemplateRender('#categoryActiveTemplate', data);
            }, name: 'is_active',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#categoryActionTemplate', data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: categoryCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#categoriesTable').DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    })
});

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    var id = $('#category_id').val();
    $.ajax({
        url: categoriesUrl + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#categoriesTable').DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    })
});

$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

window.renderData = function (id) {
    $.ajax({
        url: categoriesUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let category = result.data;
                $('#category_id').val(category.id);
                $('#edit_name').val(category.name);
                if(category.is_active === 1)
                    $('#edit_is_active').prop('checked', true);
                else
                    $('#edit_is_active').prop('checked', false);
                $('#editModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    })
};
$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let categoryId = $(event.currentTarget).data('id');
    renderData(categoryId);
});

$(document).on('click', '.delete-btn', function (event) {
    let categoryId = $(event.currentTarget).data('id');
    deleteItem(categoriesUrl + '/' + categoryId, '#categoriesTable',
        'Medicine Category');
});

// category activation deactivation change event
$(document).on('change', '.is-active', function (event) {
    let categoryId = $(event.currentTarget).data('id');
    activeDeActiveCategory(categoryId);
});

// activate de-activate category
window.activeDeActiveCategory = function (id) {
    $.ajax({
        url: categoriesUrl + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    })
};
