$(document).ready(function () {
    'use strict';

    let tbl = $('#liveMeetingTable').DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: liveMeetingUrl,
        },
        columnDefs: [
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
            {
                'targets': [3],
                'orderable': false,
                'className': 'text-center',
                'width': '10%',
            },
            {
                'targets': [5],
                'orderable': false,
                'className': 'text-center',
                'width': '8%',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return '<a href="#" class="show-data" data-id="' + row.id +
                        '">' + row.consultation_title + '</a>';
                },
                name: 'consultation_title',
            },
            {
                data: function (row) {
                    return row;
                },
                render: function (row) {
                    if (row.consultation_date === null) {
                        return 'N/A';
                    }

                    return moment(row.consultation_date, 'YYYY-MM-DD hh:mm:ss').
                        format('Do MMM, YYYY hh:mm A');
                },
                name: 'consultation_date',
            },
            {
                data: 'user.full_name',
                name: 'user.first_name',
            },
            {
                data: function (row) {
                    if (adminRole || doctorRole) {
                        return `<select class="change-status" data-id="${row.id}">` +
                            `<option value="0" ${row.status == 0
                                ? 'selected'
                                : ''}>Awaited</option>
                            <option value="1" ${row.status == 1
                                ? 'selected'
                                : ''}>Cancelled</option>
                            <option value="2" ${row.status == 2
                                ? 'selected'
                                : ''}>Finished</option>`
                            + `</select>`;
                    }
                    return row.status_text;
                },
                name: 'status',
            },
            {
                data: 'password',
                name: 'password',
            },
            {
                data: function (row) {
                    let data = [
                        {
                            'id': row.id,
                            'status': row.status,
                            'url': !(adminRole || doctorRole)
                                ? row.meta.join_url
                                : row.meta.start_url,
                            'title': !(adminRole || doctorRole)
                                ? 'Join Meeting'
                                : 'Start Meeting',
                            'isDoctor': doctorRole,
                            'isAdmin': adminRole,
                            'isMeetingFinished': row.status == 2 ? true : false,
                        }];
                    return prepareTemplateRender('#liveMeetingActionTemplate',
                        data);
                }, name: 'user.last_name',
            },
        ],
        drawCallback: function () {
            this.api().state.clear();
            $('.change-status').select2({
                width: '100%',
            });
        },
    });

    $('#userId,.editUserId').select2({
        width: '100%',
    });
    $('.consultation-date, .edit-consultation-date').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD h:mm A',
            useCurrent: true,
            sideBySide: true,
            minDate: new Date(),
        }));

    $(document).on('submit', '#addNewForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnSave');
        loadingButton.button('loading');
        $.ajax({
            url: liveMeetingCreateUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#addModal').modal('hide');
                    $('#liveMeetingTable').DataTable().ajax.reload(null, false);
                    setTimeout(function () {
                        loadingButton.button('reset');
                    }, 2500);
                }
            },
            error: function (result) {
                printErrorMessage('#validationErrorsBox', result);
                setTimeout(function () {
                    loadingButton.button('reset');
                }, 2000);
            },
        });
    });
    $('#addModal').on('hidden.bs.modal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
        $('#userId').val(loggedInUserId).trigger('change.select2');
    });

    $(document).on('change', '.change-status', function () {
        let statusId = $(this).val();
        $.ajax({
            url: liveMeetingUrl + '/change-status',
            type: 'GET',
            data: { statusId: statusId, id: $(this).data('id') },
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#liveMeetingTable').DataTable().ajax.reload(null, false);
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    });
});

$(document).on('click', '.start-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let liveConsultationId = $(event.currentTarget).data('id');
    startRenderData(liveConsultationId);
});

window.startRenderData = function (id) {
    $.ajax({
        url: liveMeetingUrl + '/' + id + '/start',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let liveConsultation = result.data;
                $('#startLiveConsultationId').
                    val(liveConsultation.liveMeeting.id);
                $('.start-modal-title').
                    text(liveConsultation.liveMeeting.consultation_title);
                $('.host-name').
                    text(liveConsultation.liveMeeting.user.full_name);
                $('.date').text(liveConsultation.liveMeeting.consultation_date);
                $('.minutes').
                    text(
                        liveConsultation.liveMeeting.consultation_duration_minutes);
                $('#startModal').
                    find('.status').
                    append((liveConsultation.zoomLiveData.data.status ===
                        'started') ? $('.status').text('Started') : $(
                        '.status').text('Awaited'));
                !(adminRole || doctorRole)
                    ? $('.start').
                        attr('href', liveConsultation.liveMeeting.meta.join_url)
                    : ((liveConsultation.zoomLiveData.data.status ===
                    'started') ? $('.start').addClass('disabled') : $('.start').
                        attr('href', liveConsultation.liveMeeting.meta.start_url));
                $('#startModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

$(document).on('click', '.show-data', function (event) {
    let meetingId = $(event.currentTarget).data('id');
    $.ajax({
        url: liveMeetingUrl + '/' + meetingId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let liveMeeting = result.data;
                $('#showLiveConsultationId').val(liveMeeting.id);
                $('#meetingTitle').text(liveMeeting.consultation_title);
                $('#meetingDate').text(liveMeeting.consultation_date);
                $('#meetingMinutes').
                    text(liveMeeting.consultation_duration_minutes);

                (liveMeeting.host_video == 0) ? $('#meetingHost').
                    text('Disable') : $('#meetingHost').text('Enable');
                (liveMeeting.participant_video == 0) ? $('#meetingParticipant').
                    text('Disable') : $('#meetingParticipant').text('Enable');
                isEmpty(liveMeeting.description) ? $('#meetingDescription').
                    text('N/A') : $('#meetingDescription').
                    text(liveMeeting.description);
                $('#showModal').modal('show');
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let liveMeetingId = $(event.currentTarget).data('id');
    renderData(liveMeetingId);
});

window.renderData = function (id) {
    $.ajax({
        url: liveMeetingUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let liveMeeting = result.data;
                $('#liveMeetingId').val(liveMeeting.id);
                $('.edit-consultation-title').
                    val(liveMeeting.consultation_title);
                $('.edit-consultation-date').
                    val(moment(liveMeeting.consultation_date).
                        format('YYYY-MM-DD h:mm A'));
                $('.edit-consultation-duration-minutes').
                    val(liveMeeting.consultation_duration_minutes);
                $('.editUserId').
                    val(liveMeeting.meetingUsers).
                    trigger('change.select2');
                $('.host-enable,.host-disabled').prop('checked', false);
                if (liveMeeting.host_video == 1) {
                    $(`input[name="host_video"][value=${liveMeeting.host_video}]`).
                        prop('checked', true);
                } else {
                    $(`input[name="host_video"][value=${liveMeeting.host_video}]`).
                        prop('checked', true);
                }
                $('.client-enable,.client-disabled').prop('checked', false);
                if (liveMeeting.participant_video == 1) {
                    $(`input[name="participant_video"][value=${liveMeeting.participant_video}]`).
                        prop('checked', true);
                } else {
                    $(`input[name="participant_video"][value=${liveMeeting.participant_video}]`).
                        prop('checked', true);
                }
                $('.edit-description').val(liveMeeting.description);
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
    let id = $('#liveMeetingId').val();
    $.ajax({
        url: liveMeetingUrl + '/' + id,
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#liveMeetingTable').
                    DataTable().
                    ajax.
                    reload(null, false);
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

$(document).on('click', '.delete-btn', function (event) {
    let liveMeetingId = $(event.currentTarget).data('id');
    deleteItem(
        liveMeetingUrl + '/' + liveMeetingId,
        '#liveMeetingTable',
        'Live Meeting',
    );
});

$('#showModal').on('hidden.bs.modal', function () {
    $(this).
        find(
            '#meetingTitle,#meetingDate, #meetingMinutes, #meetingHost, #meetingParticipant, #meetingDescription').
        empty();
});
