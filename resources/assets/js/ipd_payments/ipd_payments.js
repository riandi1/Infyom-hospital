$(document).ready(function () {
    'use strict';

    let tableName = '#tblIpdPayments';
    $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[1, 'desc']],
        ajax: {
            url: ipdPaymentUrl,
            data: function (data) {
                data.id = ipdPatientDepartmentId;
            },
        },
        columnDefs: [
            {
                'targets': [0, 1, 2],
                'width': '10%',
            },
            {
                'targets': [0],
                'className': 'text-right',
            },
            {
                'targets': [3],
                'width': '5%',
            },
            {
                'targets': [4],
                'width': '20%',
            },
            {
                'targets': [5],
                'className': 'text-center',
                'orderable': false,
                'width': '4%',
                'visible': actionAcoumnVisibal,
            },
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
        ],
        columns: [
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
                    return row;
                },
                render: function (row) {
                    if (row.date === null) {
                        return 'N/A';
                    }

                    return moment(row.date).format('Do MMM, Y h:mm A');
                },
                name: 'date',
            },
            {
                data: function (row) {
                    return ipdPaymentModes[row.payment_mode];
                },
                name: 'payment_mode',
            },
            {
                data: function (row) {
                    if (row.ipd_payment_document_url != '') {
                        let downloadLink = downloadPaymetDocumentUrl + '/' +
                            row.id;
                        return '<a href="' + downloadLink + '">' + 'Download' +
                            '</a>';
                    } else
                        return 'N/A';
                },
                name: 'id',
            },
            {
                data: 'notes',
                name: 'notes',
            },
            {
                data: function (row) {
                    let isPaymentModeStripe = (row.payment_mode == 3)
                        ? true
                        : false;
                    let data = [
                        {
                            'id': row.id,
                            'isPaymentModeStripe': isPaymentModeStripe,
                        }];
                    return prepareTemplateRender('#ipdPaymentActionTemplate',
                        data);
                }, name: 'id',
            },
        ],
    });
    $('#ipdPaymentDate,#editIpdPaymentDate').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            minDate: ipdPatientCaseDate,
            widgetPositioning: {
                horizontal: 'right',
                vertical: 'bottom',
            },
        }));

    $('#paymentModeId, #editPaymentModeId').select2({
        width: '100%',
    });

    $(document).on('click', '.ipdpayment-delete-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        let url = ipdPaymentUrl + '/' + id;
        swal({
            title: 'Delete !',
            text: 'Are you sure want to delete this " IPD Payment " ?',
            type: 'warning',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
        }, function () {
            deleteItemAjax(url, tableName, 'IPD Payment');
            location.reload();
        });
    });

    $(document).on('click', '.ipdpayment-edit-btn', function (event) {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let ipdPaymentId = $(event.currentTarget).data('id');
        renderData(ipdPaymentId);
    });

    $(document).on('submit', '#addIpdPaymentNewForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnIpdPaymentSave');
        loadingButton.button('loading');

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: ipdPaymentCreateUrl,
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function success (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#addIpdPaymentModal').modal('hide');
                    location.reload();
                }
            },
            error: function error (result) {
                printErrorMessage('#paymentValidationErrorsBox', result);
            },
            complete: function complete () {
                loadingButton.button('reset');
            },
        });

    });

    window.renderData = function (id) {
        $.ajax({
            url: ipdPaymentUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    let ext = result.data.ipd_payment_document_url.split('.').
                        pop().
                        toLowerCase();
                    if (ext == 'pdf') {
                        $('#editPaymentPreviewImage').
                            attr('src', pdfDocumentImageUrl);
                    } else if ((ext == 'docx') || (ext == 'doc')) {
                        $('#editPaymentPreviewImage').
                            attr('src', docxDocumentImageUrl);
                    } else {
                        if (result.data.ipd_payment_document_url != '') {
                            $('#editPaymentPreviewImage').
                                attr('src',
                                    result.data.ipd_payment_document_url);
                        }
                    }
                    $('#ipdPaymentId').val(result.data.id);
                    $('#editIpdPaymentAmount').val(result.data.amount);
                    $('#editIpdPaymentDate').
                        val(moment(result.data.date).
                            format('YYYY-MM-DD HH:mm:ss'));
                    $('#editIpdPaymentNote').val(result.data.notes);
                    $('#editPaymentModeId').
                        val(result.data.payment_mode).
                        trigger('change.select2');
                    $('#editIpdPaymentModal').modal('show');
                    ajaxCallCompleted();
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };
    $(document).on('submit', '#editIpdPaymentForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnIpdPaymentSave');
        loadingButton.button('loading');
        let id = $('#ipdPaymentId').val();
        let url = ipdPaymentUrl + '/' + id;
        let data = {
            'formSelector': $(this),
            'url': url,
            'type': 'POST',
            'tableSelector': tableName,
        };
        editIpdPaymentRecord(data, loadingButton, '#editIpdPaymentModal');

    });

    $('#addIpdPaymentModal').on('hidden.bs.modal', function () {
        resetModalForm('#addIpdPaymentNewForm', '#paymentValidationErrorsBox');
        $('#paymentPreviewImage').attr('src', defaultDocumentImageUrl);
    });

    $('#editIpdPaymentModal').on('hidden.bs.modal', function () {
        resetModalForm('#editIpdPaymentForm',
            '#editPaymentValidationErrorsBox');
    });
});

$(document).on('change', '#paymentDocumentImage', function () {
    let extension = isValidDocument($(this), '#paymentValidationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#paymentValidationErrorsBox').html('').hide();
        displayDocument(this, '#paymentPreviewImage', extension);
    }
});

$(document).on('change', '#editPaymentDocumentImage', function () {
    let extension = isValidDocument($(this), '#editPaymentValidationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#editValidationErrorsBox').html('').hide();
        displayDocument(this, '#editPaymentPreviewImage', extension);
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

function deleteItemAjax (url, tableId, header, callFunction = null) {
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        success: function (obj) {
            if (obj.success) {
                location.reload();
            }
            swal({
                title: 'Deleted!',
                text: header + ' has been deleted.',
                type: 'success',
                timer: 2000,
            });
            if (callFunction) {
                eval(callFunction);
            }
        },
        error: function (data) {
            swal({
                title: '',
                text: data.responseJSON.message,
                type: 'error',
                timer: 5000,
            });
        },
    });
}

window.editIpdPaymentRecord = function (data, loadingButton) {
    var modalSelector = arguments.length > 2 && arguments[2] !== undefined
        ? arguments[2]
        : '#EditModal';
    var formData = data.formSelector === '' ? data.formData : new FormData(
        $(data.formSelector)[0]);
    $.ajax({
        url: data.url,
        type: data.type,
        data: formData,
        processData: false,
        contentType: false,
        success: function success (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(modalSelector).modal('hide');
                location.reload();
            }
        },
        error: function error (result) {
            UnprocessableInputError(result);
        },
        complete: function complete () {
            loadingButton.button('reset');
        },
    });
};
