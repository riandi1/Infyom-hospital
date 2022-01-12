$(document).ready(function () {
    'use strict';

    let tableName = '#tblDocuments';
    $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[3, 'asc']],
        ajax: {
            url: documentsUrl,
        },
        columnDefs: [
            {
                'targets': [0],
                'className': 'text-center',
                'width': '10%',
            },
            {
                'targets': [4],
                'orderable': false,
                'className': 'text-center',
                'width': '6%',
            },
            {
                'targets': [0],
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
                data: function (row) {
                    let downloadLink = downloadDocumentUrl + '/' + row.id;
                    return '<a href="' + downloadLink + '">' + 'Download' +
                        '</a>';
                },
                name: 'title',
            },
            {
                data: function (row) {
                    let showLink = documentsUrl + '/' + row.id;
                    return '<a href="' + showLink + '">' + row.title + '</a>';
                },
                name: 'title',
            },
            {
                data: 'document_type.name',
                name: 'documentType.name',
            },
            {
                data: 'patient.user.full_name',
                name: 'patient.user.first_name',
            },
            {
                data: function (row) {
                    let data = [{ 'id': row.id }];
                    return prepareTemplateRender('#documentsActionTemplate',
                        data);
                }, name: 'patient.user.last_name',
            },
        ],
    });

    $('#patientId, #documentTypeId, #editPatientId, #editDocumentTypeId').
        select2({
            width: '100%',
        });

    $(document).on('click', '.delete-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        deleteItem(documentsUrl + '/' + id, tableName, 'Document');
    });

    var filename;
    $('#documentImage').change(function () {
        filename = $(this).val();
    });

    $(document).on('submit', '#addNewForm', function (event) {
        event.preventDefault();
        if (filename == null || filename == '') {
            $('#validationErrorsBox').
                html(
                    'Please select attachment').show();
            return false;
        }
        if ($('#validationErrorsBox').text() !== '') {
            $('#documentImage').focus();
            return false;
        }
        let loadingButton = jQuery(this).find('#btnSave');
        loadingButton.button('loading');
        let data = {
            'formSelector': $(this),
            'url': documentsCreateUrl,
            'type': 'POST',
            'tableSelector': tableName,
        };
        newRecord(data, loadingButton, '#addModal');
    });

    $(document).on('click', '.edit-btn', function (event) {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let documentId = $(event.currentTarget).data('id');
        renderData(documentId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: documentsUrl + '/' + id + '/edit',
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
                    } else {
                        $('#editPreviewImage').
                            attr('src', result.data.document_url);
                    }

                    $('#editDocumentTypeId').
                        val(result.data.document_type_id).
                        trigger('change.select2');
                    $('#editPatientId').
                        val(result.data.patient_id).
                        trigger('change.select2');
                    $('#editTitle').val(result.data.title);
                    $('#documentUrl').attr('href', result.data.document_url);
                    $('#documentId').val(result.data.id);
                    $('#editNotes').val(result.data.notes);
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
        let id = $('#documentId').val();
        let url = documentsUrl + '/' + id + '/update';
        let data = {
            'formSelector': $(this),
            'url': url,
            'type': 'POST',
            'tableSelector': tableName,
        };
        editRecord(data, loadingButton);
    });

    $('#addModal').on('hidden.bs.modal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
        $('#previewImage').attr('src', defaultDocumentImageUrl);
    });

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editDocumentValidationErrorsBox');
    });
});

$(document).on('change', '#documentImage', function () {
    let extension = isValidDocument($(this), '#validationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#validationErrorsBox').html('').hide();
        displayDocument(this, '#previewImage', extension);
    }
});

$(document).on('change', '#editDocumentImage', function () {
    let extension = isValidDocument($(this),
        '#editDocumentValidationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#editDocumentValidationErrorsBox').html('').hide();
        displayDocument(this, '#editPreviewImage', extension);
    }
});

window.isValidDocument = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).
            html(
                'The document must be a file of type: jpeg, jpg, png, pdf, doc, docx.').
            show();
        return false;
    }
    return ext;
};
