$(document).ready(function () {
    'use strict';

    $('#addModal, #EditModal').on('shown.bs.modal', function () {
        $('#expenseId, #editExpenseHeadId:first').focus();
    });

    $('#expenseId, #editExpenseHeadId,#expenseHead').select2({
        width: '100%',
    });

    $('#date, #editDate').datetimepicker(DatetimepickerDefaults({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
    }));

    let tableName = '#expensesTable';
    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[3, 'desc']],
        ajax: {
            url: expenseUrl,
            data: function (data) {
                data.expense_head = $('#expenseHead').
                    find('option:selected').
                    val();
            },
        },
        columnDefs: [
            {
                'targets': [0],
                'className': 'text-center',
                'width': '12%',
            },
            {
                'targets': [4],
                'className': 'text-right',
                'width': '10%',
            },
            {
                'targets': [0, 3],
                'width': '12%',
            },
            {
                'targets': [2],
                'width': '22%',
            },
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
            {
                'targets': [5, 6],
                'orderable': false,
                'className': 'text-center',
                'width': '8%',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return isEmpty(row.invoice_number)
                        ? 'N/A'
                        : row.invoice_number;
                },
                name: 'invoice_number',
            },
            {
                data: function (row) {
                    let showLink = expenseUrl + '/' + row.id;
                    return '<a href="' + showLink + '">' + row.name + '</a>';
                },
                name: 'name',
            },
            {
                data: function (row) {
                    return expenseHeadArray[row.expense_head];
                },
                name: 'expense_head',
            },
            {
                data: function (row) {
                    return row;
                },
                render: function (row) {
                    if (row.date === null) {
                        return 'N/A';
                    }
                    return moment(row.date).format('Do MMM, Y');
                },
                name: 'date',
            },
            {
                data: function (row) {
                    return !isEmpty(row.amount)
                        ? '<p class="cur-margin">' +
                        getCurrentCurrencyClass() + ' ' +
                        addCommas(row.amount) + '</p>'
                        : 'N/A';
                },
                name: 'amount',
            },
            {
                data: function (row) {
                    if (row.document_url != '') {
                        let downloadLink = downloadDocumentUrl + '/' + row.id;
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
                    return prepareTemplateRender('#expenseTemplate', data);
                },
                name: 'id',
            },
        ],
        'fnInitComplete': function () {
            $('#expenseHead').change(function () {
                $(tableName).DataTable().ajax.reload(null, true);
            });
        },
    });

    $(document).on('submit', '#addNewForm', function (event) {
        event.preventDefault();
        $('#btnSave').attr('disabled', true);
        var loginButton = jQuery(this).find('#btnSave');
        loginButton.button('loading');
        let data = {
            'formSelector': $(this),
            'url': expenseCreateUrl,
            'type': 'POST',
            'tableSelector': tableName,
        };
        newRecord(data, loginButton, '#addModal');
    });

    $(document).on('click', '.delete-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        deleteItem(expenseUrl + '/' + id, tableName, 'Expense');
    });

    $(document).on('click', '.edit-btn', function (event) {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let expenseId = $(event.currentTarget).data('id');
        renderData(expenseId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: expenseUrl + '/' + id + '/edit',
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

                    $('#editExpenseId').val(result.data.id);
                    $('#editExpenseHeadId').
                        val(result.data.expense_head).
                        trigger('change.select2');
                    $('#editName').val(result.data.name);
                    $('#editDate').val(format(result.data.date, 'YYYY-MM-DD'));
                    $('#editInvoiceNumber').val(result.data.invoice_number);
                    $('#editAmount').val(result.data.amount);
                    $('.price-input').trigger('input');
                    $('#editDescription').val(result.data.description);
                    if (isEmpty(result.data.document_url)) {
                        $('#documentUrl').text('');
                    } else {
                        $('#documentUrl').html('View');
                        $('#documentUrl').
                            attr('href', result.data.document_url);
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

    $(document).on('submit', '#editForm', function (event) {
        event.preventDefault();
        $('#btnSave').attr('disabled', true);
        let loadingButton = jQuery(this).find('#btnEditSave');
        loadingButton.button('loading');
        let id = $('#editExpenseId').val();
        let url = expenseUrl + '/' + id + '/update';
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
        $('#expenseId').val('').trigger('change.select2');
        $('#previewImage').attr('src', defaultDocumentImageUrl);
    });

    $('#EditModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox');
    });

    $(document).on('change', '#attachment', function () {
        let extension = isValidDocument($(this), '#validationErrorsBox');
        if (!isEmpty(extension) && extension != false) {
            $('#validationErrorsBox').html('').hide();
            displayDocument(this, '#previewImage', extension);
        }
    });

    $(document).on('change', '#editAttachment', function () {
        let extension = isValidDocument($(this), '#editValidationErrorsBox');
        if (!isEmpty(extension) && extension != false) {
            $('#editValidationErrorsBox').html('').hide();
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
                html(documentError).show();
            return false;
        }
        return ext;
    };
});
