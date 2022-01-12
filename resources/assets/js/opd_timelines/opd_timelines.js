$(document).ready(function () {
    'use strict';

    getOpdTimelines($('#opdPatientDepartmentId').val());

    $('#timelineDate, #editTimelineDate').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
            minDate: moment(appointmentDate).format('YYYY-MM-DD'),
        }));

    $(document).on('submit', '#addOpdTimelineNewForm', function (e) {
        e.preventDefault();
        let loadingButton = jQuery(this).find('#btnOpdTimelineSave');
        loadingButton.button('loading');
        let data = {
            'formSelector': $(this),
            'url': opdTimelineCreateUrl,
            'type': 'POST',
            'tableSelector': '#tbl',
        };
        newRecord(data, loadingButton, '#addOpdTimelineModal');
        setTimeout(function () {
            getOpdTimelines($('#opdPatientDepartmentId').val());
        }, 500);
    });

    $(document).on('click', '.edit-timeline-btn', function () {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let opdTimelineId = $(this).data('timeline-id');
        renderTimelineData(opdTimelineId);
    });

    window.renderTimelineData = function (id) {
        $.ajax({
            url: opdTimelinesUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    if (result.data.opd_timeline_document_url != '') {
                        let ext = result.data.opd_timeline_document_url.split(
                            '.').
                            pop().
                            toLowerCase();
                        if (ext == 'pdf') {
                            $('#editPreviewTimelineImage').
                                attr('src', pdfDocumentImageUrl);
                        } else if ((ext == 'docx') || (ext == 'doc')) {
                            $('#editPreviewTimelineImage').
                                attr('src', docxDocumentImageUrl);
                        } else {
                            $('#editPreviewTimelineImage').
                                attr('src',
                                    result.data.opd_timeline_document_url);
                        }
                        $('#timeDocumentUrl').show();
                    } else {
                        $('#timeDocumentUrl').hide();
                        $('#editPreviewTimelineImage').
                            attr('src', defaultDocumentImageUrl);
                    }
                    $('#opdTimelineId').val(result.data.id);
                    $('#editTimelineTitle').val(result.data.title);
                    $('#editTimelineDate').val(result.data.date);
                    $('#editTimelineDescription').val(result.data.description);
                    $('#timeDocumentUrl').
                        attr('href', result.data.opd_timeline_document_url);
                    (result.data.visible_to_person == 1)
                        ? $('#editTimelineVisibleToPerson').
                            prop('checked', true)
                        : $('#editTimelineVisibleToPerson').
                            prop('checked', false);
                    $('#editOpdTimelineModal').modal('show');
                    ajaxCallCompleted();
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };

    $(document).on('submit', '#editOpdTimelineForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnOpdTimelineEdit');
        loadingButton.button('loading');
        let id = $('#opdTimelineId').val();
        let url = opdTimelinesUrl + '/' + id;
        let data = {
            'formSelector': $(this),
            'url': url,
            'type': 'POST',
            'tableSelector': '#tbl',
        };
        editRecord(data, loadingButton, '#editOpdTimelineModal');
        setTimeout(function () {
            location.reload();
        }, 500);
    });

    $(document).on('click', '.delete-timeline-btn', function () {
        let id = $(this).data('timeline-id');
        deleteOpdTimelineItem(opdTimelinesUrl + '/' + id, 'OPD Timeline');
    });

    window.deleteOpdTimelineItem = function (url, header) {
        swal({
                title: 'Delete !',
                text: 'Are you sure want to delete this "' + header + '" ?',
                type: 'warning',
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#5cb85c',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
            },
            function () {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function (obj) {
                        if (obj.success) {
                            setTimeout(function () {
                                getOpdTimelines(
                                    $('#opdPatientDepartmentId').val());
                            }, 500);
                        }
                        swal({
                            title: 'Deleted!',
                            text: header + ' has been deleted.',
                            type: 'success',
                            timer: 2000,
                        });
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
            });
    };

    $('#addOpdTimelineModal').on('hidden.bs.modal', function () {
        resetModalForm('#addOpdTimelineNewForm', '#timeLinevalidationErrorsBox');
        $('#previewTimelineImage').attr('src', defaultDocumentImageUrl);
    });

    $('#editOpdTimelineModal').on('hidden.bs.modal', function () {
        resetModalForm('#editOpdTimelineForm', '#editTimelineValidationErrorsBox');
    });
});

$(document).on('change', '#timelineDocumentImage', function () {
    let extension = isValidTimelineDocument($(this), '#timeLinevalidationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#timeLinevalidationErrorsBox').html('').hide();
        displayDocument(this, '#previewTimelineImage', extension);
    }
});

$(document).on('change', '#editTimelineDocumentImage', function () {
    let extension = isValidTimelineDocument($(this),
        '#editTimelineValidationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#editTimelineValidationErrorsBox').html('').hide();
        displayDocument(this, '#editPreviewTimelineImage', extension);
    }
});

window.isValidTimelineDocument = function (
    inputSelector, validationMessageSelector) {
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

window.getOpdTimelines = function (opdPatientDepartmentId) {
    $.ajax({
        url: opdTimelinesUrl,
        type: 'get',
        data: { id: opdPatientDepartmentId },
        success: function (data) {
            $('#opdTimelines').html(data);
        },
    });
};
