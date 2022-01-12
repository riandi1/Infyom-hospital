'use strict';

let tbl = $('#bloodDonorsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[4, 'desc']],
    ajax: {
        url: bloodDonorUrl,
    },
    columnDefs: [
        {
            'targets': [5],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [1],
            'className': 'text-right',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: 'name',
            name: 'name',
        },
        {
            data: 'age',
            name: 'age',
        },
        {
            data: function (row) {
                if (row.gender == 1)
                    return 'Female';
                else
                    return 'Male';
            },
            name: 'gender',
        },
        {
            data: 'blood_group',
            name: 'blood_group',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.last_donate_date === null) {
                    return 'N/A';
                }

                return moment(row.last_donate_date).
                    utc().
                    format('Do MMM, Y h:mm A');
            },
            name: 'last_donate_date',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#bloodDonorActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: bloodDonorCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#bloodDonorsTable').DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    var id = $('#bloodDonorId').val();
    $.ajax({
        url: bloodDonorUrl + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#bloodDonorsTable').DataTable().ajax.reload(null, false);
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
    resetModalForm('#addNewForm', '#validationErrorsBox');
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

window.renderData = function (id) {
    $.ajax({
        url: bloodDonorUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let bloodDonor = result.data;
                $('#bloodDonorId').val(bloodDonor.id);
                $('#editName').val(bloodDonor.name);
                $('#editAge').val(bloodDonor.age);
                $('#male,#female').prop('checked', false);
                if (bloodDonor.gender == 1) {
                    $('#female').prop('checked', true);
                } else {
                    $('#male').prop('checked', true);
                }
                $('#editBloodGroup').val(bloodDonor.blood_group);
                $('#editBloodGroup').trigger('change');
                $('#editLastDonationDate').
                    val(moment(bloodDonor.last_donate_date).
                        utc().
                        format('YYYY-MM-DD HH:mm:ss'));
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
    let bloodDonorId = $(event.currentTarget).data('id');
    renderData(bloodDonorId);
});

$(document).on('click', '.delete-btn', function (event) {
    let bloodDonorId = $(event.currentTarget).data('id');
    deleteItem(
        bloodDonorUrl + '/' + bloodDonorId,
        '#bloodDonorsTable',
        'Blood Donor',
    );
});

$(document).ready(function () {
    $('#bloodGroup,#editBloodGroup').select2({
        width: '100%',
    });
    $('#lastDonationDate,#editLastDonationDate').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            maxDate: new Date(),
        }));
});
