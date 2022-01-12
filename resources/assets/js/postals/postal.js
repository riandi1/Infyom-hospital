$(document).ready(function () {
    'use strict';

    $('#date, #editDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
    }));

    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'asc']],
        ajax: {
            url: postalUrl,
        },
        columnDefs: [
            {
                'targets': [3],
                'className': 'text-center',
                'width': '12%',
            },
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
            {
                'targets': [4, 5],
                'orderable': false,
                'className': 'text-center',
                'width': '8%',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return ispostal == '2' ? row.to_title : row.from_title;
                },
                name: ispostal == '2' ? 'to_title' : 'from_title',
            },
            {
                data: 'reference_no',
                name: 'reference_no',
            },
            {
                data: function (row) {
                    return ispostal == '2' ? row.from_title : row.to_title;
                },
                name: ispostal == '2' ? 'from_title' : 'to_title',
            },
            {
                data: function (row) {
                    return isEmpty(row.date) ? 'N/A' : row.date;
                },
                name: 'date',
            },
            {
                data: function (row) {
                    if (row.document_url != '') {
                        let downloadLink = postalUrl + '/' + row.id;
                        return '<a href="' + downloadLink + '">' + 'Download' +
                            '</a>';
                    } else {
                        return 'N/A';
                    }
                },
                name: 'id',
            },
            {
                data: function (row) {
                    let data = [{ 'id': row.id }];
                    return prepareTemplateRender('#postalTemplate', data);
                },
                name: 'id',
            },
        ],
    });

    $(document).on('submit', '#addNewForm', function (event) {
        event.preventDefault();
        $('#btnSave').attr('disabled', true);
        let loadingButton = jQuery(this).find('#btnSave');
        loadingButton.button('loading');
        let formData = new FormData($(this)[0]);
        $.ajax({
            url: postalCreateUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#addModal').modal('hide');
                    $(tableName).DataTable().ajax.reload(null, false);
                    setTimeout(function () {
                        loadingButton.button('reset');
                    }, 1000);
                }
            },
            error: function (result) {
                printErrorMessage('#validationErrorsBox', result);
                setTimeout(function () {
                    loadingButton.button('reset');
                }, 1000);
            },
        });
    });

    $(document).on('click', '.delete-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        deleteItem(postalUrl + '/' + id, tableName, name);
    });

    $(document).on('click', '.edit-btn', function (event) {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let postalId = $(event.currentTarget).data('id');
        renderData(postalId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: postalUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    let ext = result.data.document_url.split('.').
                        pop().
                        toLowerCase();
                    if (ext == 'pdf') {
                        $('#editPreviewImage').attr('src', pdfDocumentImageUrl);
                    } else if ((ext == 'docx') || (ext == 'doc')) {
                        $('#editPreviewImage').
                            attr('src', docxDocumentImageUrl);
                    } else if (ext == '') {
                        $('#editPreviewImage').
                            attr('src', defaultDocumentImageUrl);
                    } else {
                        $('#editPreviewImage').
                            attr('src', result.data.document_url);
                    }

                    $(hiddenId).val(result.data.id);
                    $('#editFromTitle').val(result.data.from_title);
                    $('#editDate').
                        val(result.data.date ? format(result.data.date,
                            'YYYY-MM-DD') : '');
                    $('#editReferenceNumber').val(result.data.reference_no);
                    $('#editToTitle').val(result.data.to_title);
                    $('#editAddress').val(result.data.address);
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
        $('#btnSave').attr('disabled', true);
        let loadingButton = jQuery(this).find('#btnEditSave');
        loadingButton.button('loading');
        let id = $(hiddenId).val();
        let url = postalUrl + '/' + id;
        let data = {
            'formSelector': $(this),
            'url': url,
            'type': 'post',
            'tableSelector': tableName,
        };
        editRecord(data, loadingButton);
        $('#editModal').modal('hide');
    });

    $('#addModal').on('hidden.bs.modal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
        $('#previewImage').attr('src', defaultDocumentImageUrl);
    });

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox1');
        $('#previewImage').attr('src', defaultDocumentImageUrl);
    });

    $(document).on('change', '#attachment', function () {
        let extension = isValidDocument($(this), '#validationErrorsBox');
        if (!isEmpty(extension) && extension != false) {
            $('#validationErrorsBox').html('').hide();
            displayDocument(this, '#previewImage', extension);
        }
    });

    $(document).on('change', '#editAttachment', function () {
        let extension = isValidDocument($(this),
            '#editModal #editValidationErrorsBox1');
        if (!isEmpty(extension) && extension != false) {
            displayDocument(this, '#editPreviewImage', extension);
        }
    });

    window.isValidDocument = function (
        inputSelector, validationMessageSelector) {
        let ext = $(inputSelector).val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx']) ==
            -1) {
            $(inputSelector).val('');
            $(validationMessageSelector).
                html(documentError).
                removeClass('display-none');
            $(validationMessageSelector).removeAttr('style');
            return false;
        }

        $(validationMessageSelector).
            html(documentError).
            addClass('display-none');
        return ext;
    };
});
