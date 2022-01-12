'use strict';

let tableName = '#testimonialTbl';
let tbl = $('#testimonialTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: testimonialUrl,
    },
    columnDefs: [
        {
            'targets': [0, 3],
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
                return `<img src="${row.document_url}" class="user-img image-stretching">`;
            },
            name: 'id',
        },
        {
            data: 'name',
            name: 'name',
        },
        {
            data: 'description',
            name: 'description',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#testimonialActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    let formData = new FormData($(this)[0]);
    $.ajax({
        url: testimonialCreateUrl,
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function success (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $(tableName).DataTable().ajax.reload(null, false);
            }
        },
        error: function error (result) {
            printErrorMessage('#validationErrorsBox', result);
        },
        complete: function complete () {
            loadingButton.button('reset');
        },
    });

});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let testimonialId = $(event.currentTarget).data('id');
    renderData(testimonialId);
});

window.renderData = function (id) {
    $.ajax({
        url: testimonialUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let ext = result.data.document_url.split('.').
                    pop().
                    toLowerCase();
                if (ext == '') {
                    $('#editPreviewImage').
                        attr('src', defaultDocumentImageUrl);
                } else {
                    $('#editPreviewImage').
                        attr('src', result.data.document_url);
                }
                $('#testimonialId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editDescription').val(result.data.description);
                if (isEmpty(result.data.document_url)) {
                    $('#documentUrl').text('');
                } else {
                    $('#documentUrl').html('View');
                    $('#documentUrl').
                        attr('href', result.data.document_url);
                }
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
    let id = $('#testimonialId').val();
    let formData = new FormData($(this)[0]);
    $.ajax({
        url: testimonialUrl + '/' + id,
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $(tableName).DataTable().ajax.reload(null, false);
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
    resetModalForm('#addNewForm', '#addModal #validationErrorsBox');
    $('#previewImage').attr('src', defaultDocumentImageUrl);
});

$('#addModal').on('shown.bs.modal', function () {
    $('#addModal #validationErrorsBox').show();
    $('#addModal #validationErrorsBox').addClass('d-none');
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editModal #editValidationErrorsBox');
    $('#previewImage').attr('src', defaultDocumentImageUrl);
});

$('#editModal').on('shown.bs.modal', function () {
    $('#editModal #editValidationErrorsBox').show();
    $('#editModal #editValidationErrorsBox').addClass('d-none');
});

$(document).on('click', '.delete-btn', function (event) {
    let testimonialId = $(event.currentTarget).data('id');
    deleteItem(testimonialUrl + '/' + testimonialId, tableName, 'Testimonial');
});

$(document).on('change', '#profile', function () {
    let extension = isValidDocument($(this), '#addModal #validationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        displayDocument(this, '#previewImage', extension);
    }
});

$(document).on('change', '#editProfile', function () {
    let extension = isValidDocument($(this),
        '#editModal #editValidationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        displayDocument(this, '#editPreviewImage', extension);
    }
});

window.isValidDocument = function (
    inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) ==
        -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).
            html(profileError).
            removeClass('d-none');
        return false;
    }
    $(validationMessageSelector).
        html(profileError).
        addClass('d-none');
    return ext;
};
