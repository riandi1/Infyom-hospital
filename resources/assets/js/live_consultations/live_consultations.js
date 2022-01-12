'use strict';

let tbl = $('#liveConsultationTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: liveConsultationUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [1],
            'width': '15%',
        },
        {
            'targets': [5, 7],
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
            data: 'doctor.user.full_name',
            name: 'doctor.user.first_name',
        },
        {
            data: 'patient.user.full_name',
            name: 'patient.user.first_name',
        },
        {
            data: function (row) {
                if (adminRole || doctorRole) {
                    return `<select class="change-status" data-id="${row.id}">` +
                        `<option value="0" ${row.status == 0 ? 'selected' : ''}>Awaited</option>
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
            name: 'user.last_name',
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
                        'url': (patientRole)
                            ? row.meta.join_url
                            : row.meta.start_url,
                        'title': (patientRole)
                            ? 'Join Meeting'
                            : 'Start Meeting',
                        'isDoctor': doctorRole,
                        'isAdmin': adminRole,
                        'isMeetingFinished': row.status == 2 ? true : false,
                    }];

                return prepareTemplateRender('#liveConsultationActionTemplate',
                    data);
            }, name: 'patient.user.last_name',
        },
    ],
    drawCallback: function () {
        this.api().state.clear();
        $('.change-status').select2({
            width: '100%',
        });
    },
});

$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
});
$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

let patientId = null;
$('.consultation-type, .edit-consultation-type').on('change', function () {
    changeTypeNumber(
        '.consultation-type-number, .edit-consultation-type-number',
        $(this).val(), patientId);
});
$('.patient-name, .edit-patient-name').on('change', function () {
    if ($(this).val() !== '') {
        patientId = $(this).val();
        $('.consultation-type, .edit-consultation-type').removeAttr('disabled');
    }
});

window.changeTypeNumber = function (selector, id, patientId) {
    if ($(this).val() !== '') {
        $.ajax({
            url: liveConsultationTypeNumber,
            type: 'get',
            dataType: 'json',
            data: {
                consultation_type: id,
                patient_id: patientId,
            },
            success: function (data) {
                if (data.data.length !== 0) {
                    $(selector).empty();
                    $(selector).removeAttr('disabled');
                    $.each(data.data, function (i, v) {
                        $(selector).
                            append($('<option></option>').
                                attr('value', i).
                                text(v));
                    });
                } else {
                    $(selector).prop('disabled', true);
                }
            },
        });
    }
    $(selector).empty();
    $(selector).prop('disabled', true);
};

$(document).ready(function () {
    $('.doctor-name,.patient-name,.consultation-type,.consultation-type-number,.change-status, .edit-doctor-name,.edit-patient-name,.edit-consultation-type,.edit-consultation-type-number,.edit-change-status').
        select2({
            width: '100%',
        });
    $('.consultation-date, .edit-consultation-date').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD h:mm A',
            useCurrent: true,
            sideBySide: true,
            minDate: new Date(),
        }));
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: liveConsultationCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#liveConsultationTable').
                    DataTable().
                    ajax.
                    reload(null, false);
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

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    let id = $('#liveConsultationId').val();
    $.ajax({
        url: liveConsultationUrl + '/' + id,
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#liveConsultationTable').
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

window.renderData = function (id) {
    $.ajax({
        url: liveConsultationUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let liveConsultation = result.data;
                $('#liveConsultationId').val(liveConsultation.id);
                $('.edit-consultation-title').
                    val(liveConsultation.consultation_title);
                $('.edit-consultation-date').
                    val(moment(liveConsultation.consultation_date).
                        format('YYYY-MM-DD h:mm A'));
                $('.edit-consultation-duration-minutes').
                    val(liveConsultation.consultation_duration_minutes);
                $('.edit-patient-name').
                    val(liveConsultation.patient_id).
                    trigger('change');
                $('.edit-doctor-name').
                    val(liveConsultation.doctor_id).
                    trigger('change');
                $('.host-enable,.host-disabled').prop('checked', false);
                if (liveConsultation.host_video == 1) {
                    $(`input[name="host_video"][value=${liveConsultation.host_video}]`).
                        prop('checked', true);
                } else {
                    $(`input[name="host_video"][value=${liveConsultation.host_video}]`).
                        prop('checked', true);
                }
                $('.client-enable,.client-disabled').prop('checked', false);
                if (liveConsultation.participant_video == 1) {
                    $(`input[name="participant_video"][value=${liveConsultation.participant_video}]`).
                        prop('checked', true);
                } else {
                    $(`input[name="participant_video"][value=${liveConsultation.participant_video}]`).
                        prop('checked', true);
                }
                $('.edit-consultation-type').val(liveConsultation.type).
                    trigger('change');
                $('.edit-consultation-type-number').
                    val(liveConsultation.type_number).
                    trigger('change');
                $('.edit-description').val(liveConsultation.description);
                $('#editModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let liveConsultationId = $(event.currentTarget).data('id');
    renderData(liveConsultationId);
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
        url: liveConsultationUrl + '/' + id + '/start',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let liveConsultation = result.data;
                $('#startLiveConsultationId').
                    val(liveConsultation.liveConsultation.id);
                $('.start-modal-title').
                    text(liveConsultation.liveConsultation.consultation_title);
                $('.host-name').
                    text(liveConsultation.liveConsultation.user.full_name);
                $('.date').
                    text(liveConsultation.liveConsultation.consultation_date);
                $('.minutes').
                    text(
                        liveConsultation.liveConsultation.consultation_duration_minutes);
                $('#startModal').
                    find('.status').
                    append((liveConsultation.zoomLiveData.data.status ===
                        'started') ? $('.status').text('Started') : $(
                        '.status').text('Awaited'));
                $('.start').
                    attr('href', (patientRole)
                        ? liveConsultation.liveConsultation.meta.join_url
                        : ((liveConsultation.zoomLiveData.data.status ===
                            'started')
                            ? $('.start').addClass('disabled')
                            : liveConsultation.liveConsultation.meta.start_url),
                    );
                $('#startModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

$(document).on('click', '.delete-btn', function (event) {
    let liveConsultationId = $(event.currentTarget).data('id');
    deleteItem(
        liveConsultationUrl + '/' + liveConsultationId,
        '#liveConsultationTable',
        'Live Consultation',
    );
});

$(document).on('change', '.change-status', function () {
    let statusId = $(this).val();
    $.ajax({
        url: liveConsultationUrl + '/change-status',
        type: 'GET',
        data: { statusId: statusId, id: $(this).data('id') },
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#liveConsultationTable').
                    DataTable().
                    ajax.
                    reload(null, false);
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
});

$(document).on('click', '.show-data', function (event) {
    let consultationId = $(event.currentTarget).data('id');
    $.ajax({
        url: liveConsultationUrl + '/' + consultationId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let liveConsultation = result.data.liveConsultation;
                let showModal = $('#showModal');
                $('#startLiveConsultationId').val(liveConsultation.id);
                $('#consultationTitle').
                    text(liveConsultation.consultation_title);
                $('#consultationDate').text(liveConsultation.consultation_date);
                $('#consultationDurationMinutes').
                    text(liveConsultation.consultation_duration_minutes);
                $('#consultationPatient').
                    text(liveConsultation.patient.user.full_name);
                $('#consultationDoctor').
                    text(liveConsultation.doctor.user.full_name);
                (liveConsultation.type == 0) ? showModal.find(
                    '#consultationType').append('OPD') : showModal.find(
                    '#consultationType').append('IPD');
                (liveConsultation.type == 0)
                    ? showModal.find('#consultationTypeNumber').
                        append(liveConsultation.opd_patient.opd_number)
                    : showModal.find('#consultationTypeNumber').
                        append(liveConsultation.ipd_patient.ipd_number);
                (liveConsultation.host_video === 0) ? $(
                    '#consultationHostVideo').text('Disable') : $(
                    '#consultationHostVideo').text('Enable');
                (liveConsultation.participant_video === 0) ? $(
                    '#consultationParticipantVideo').text('Disable') : $(
                    '#consultationParticipantVideo').text('Enable');
                isEmpty(liveConsultation.description) ? $(
                    '#consultationDescription').text('N/A') : $(
                    '#consultationDescription').
                    text(liveConsultation.description);
                showModal.modal('show');
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
});
$('#showModal').on('hidden.bs.modal', function () {
    $(this).
        find(
            '#consultationTitle, #consultationDate, #consultationDurationMinutes, #consultationPatient, #consultationDoctor, #consultationType, #consultationTypeNumber, #consultationHostVideo, #consultationParticipantVideo, #consultationDescription').
        empty();
});

$(document).on('click', '.add-credential', function () {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let userId = $('#userId').val();
    userZoomRenderData(userId);
});

window.userZoomRenderData = function (id) {
    $.ajax({
        url: 'user-zoom-credential/' + id + '/fetch',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let userZoomData = result.data;
                if (!isEmpty(userZoomData)) {
                    $('#zoomApiKey').val(userZoomData.zoom_api_key);
                    $('#zoomApiSecret').val(userZoomData.zoom_api_secret);
                }
                $('#addCredential').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

$(document).on('submit', '#addZoomForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnZoomSave');
    loadingButton.button('loading');
    $.ajax({
        url: zoomCredentialCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addCredential').modal('hide');
                setTimeout(function () {
                    loadingButton.button('reset');
                }, 2500);
            }
        },
        error: function (result) {
            printErrorMessage('#credentialValidationErrorsBox', result);
            setTimeout(function () {
                loadingButton.button('reset');
            }, 2000);
        },
    });
});
