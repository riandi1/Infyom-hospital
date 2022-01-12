$(document).ready(function () {
    'use strict';

    getIpdTimelines($('#ipdPatientDepartmentId').val());

    $('#timelineDate, #editTimelineDate').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
            minDate: ipdPatientCaseDate,
        }));

    $(document).on('submit', '#addIpdTimelineNewForm', function (e) {
        e.preventDefault();
        let loadingButton = jQuery(this).find('#btnIpdTimelineSave');
        loadingButton.button('loading');
        let data = {
            'formSelector': $(this),
            'url': ipdTimelineCreateUrl,
            'type': 'POST',
            'tableSelector': '#tbl',
        };
        newRecord(data, loadingButton, '#addIpdTimelineModal');
        setTimeout(function () {
            getIpdTimelines($('#ipdPatientDepartmentId').val());
        }, 500);
    });

    $(document).on('click', '.edit-timeline-btn', function () {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let ipdTimelineId = $(this).data('timeline-id');
        renderTimelineData(ipdTimelineId);
    });

    window.renderTimelineData = function (id) {
        $.ajax({
            url: ipdTimelinesUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    if (result.data.ipd_timeline_document_url != '') {
                        let ext = result.data.ipd_timeline_document_url.split(
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
                                    result.data.ipd_timeline_document_url);
                        }
                        $('#timeDocumentUrl').show();
                    } else {
                        $('#timeDocumentUrl').hide();
                        $('#editPreviewTimelineImage').
                            attr('src', defaultDocumentImageUrl);
                    }
                    $('#ipdTimelineId').val(result.data.id);
                    $('#editTimelineTitle').val(result.data.title);
                    $('#editTimelineDate').val(result.data.date);
                    $('#editTimelineDescription').val(result.data.description);
                    $('#timeDocumentUrl').
                        attr('href', result.data.ipd_timeline_document_url);
                    (result.data.visible_to_person == 1)
                        ? $('#editTimelineVisibleToPerson').
                            prop('checked', true)
                        : $('#editTimelineVisibleToPerson').
                            prop('checked', false);
                    $('#editIpdTimelineModal').modal('show');
                    ajaxCallCompleted();
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };

    $(document).on('submit', '#editIpdTimelineForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnIpdTimelineEdit');
        loadingButton.button('loading');
        let id = $('#ipdTimelineId').val();
        let url = ipdTimelinesUrl + '/' + id;
        let data = {
            'formSelector': $(this),
            'url': url,
            'type': 'POST',
            'tableSelector': '#tbl',
        };
        editRecord(data, loadingButton, '#editIpdTimelineModal');
        setTimeout(function () {
            location.reload();
        }, 500);
    });

    $(document).on('click', '.delete-timeline-btn', function () {
        let id = $(this).data('timeline-id');
        deleteIpdTimelineItem(ipdTimelinesUrl + '/' + id, 'IPD Timeline');
    });

    window.deleteIpdTimelineItem = function (url, header) {
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
                                getIpdTimelines(
                                    $('#ipdPatientDepartmentId').val());
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

    $('#addIpdTimelineModal').on('hidden.bs.modal', function () {
        resetModalForm('#addIpdTimelineNewForm', '#validationErrorsBox');
        $('#previewTimelineImage').attr('src', defaultDocumentImageUrl);
    });

    $('#editIpdTimelineModal').on('hidden.bs.modal', function () {
        resetModalForm('#editIpdTimelineForm', '#editValidationErrorsBox');
    });
});

$(document).on('change', '#timelineDocumentImage', function () {
    let extension = isValidTimelineDocument($(this), '#validationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#validationErrorsBox').html('').hide();
        displayDocument(this, '#previewTimelineImage', extension);
    }
});

$(document).on('change', '#editTimelineDocumentImage', function () {
    let extension = isValidTimelineDocument($(this),
        '#editValidationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#editValidationErrorsBox').html('').hide();
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

window.getIpdTimelines = function (ipdPatientDepartmentId) {
    $.ajax({
        url: ipdTimelinesUrl,
        type: 'get',
        data: { id: ipdPatientDepartmentId },
        success: function (data) {
            $('#ipdTimelines').html(data);
        },
    });
};
