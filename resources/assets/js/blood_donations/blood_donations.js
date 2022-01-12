'use strict';

let tbl = $('#bloodDonationTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: bloodDonationUrl,
    },
    columnDefs: [
        {
            'targets': [2],
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
            data: 'blooddonor.name',
            name: 'blooddonor.name',
        },
        {
            data: 'bags',
            name: 'bags',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#bloodDonationActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: bloodDonationCreateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#bloodDonationTable').DataTable().ajax.reload(null, false);
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
    let id = $('#bloodDonationId').val();
    $.ajax({
        url: bloodDonationUrl + '/' + id,
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#bloodDonationTable').DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
        complete: function () {
            loadingButton.button('reset');
            $('#btnSave').attr('disabled', true);
        },
    });
});

$('#addModal').on('hidden.bs.modal', function () {
    $('#donorName').val('').trigger('change.select2');
    resetModalForm('#addNewForm', '#validationErrorsBox');
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

window.renderData = function (id) {
    $.ajax({
        url: bloodDonationUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let bloodDonation = result.data;
                $('#bloodDonationId').val(bloodDonation.id);
                $('#editDonorName').val(bloodDonation.blood_donor_id);
                $('#editDonorName').trigger('change');
                $('#editBags').val(bloodDonation.bags);
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
    let bloodDonationId = $(event.currentTarget).data('id');
    renderData(bloodDonationId);
});

$(document).on('click', '.delete-btn', function (event) {
    let bloodDonationId = $(event.currentTarget).data('id');
    deleteItem(
        bloodDonationUrl + '/' + bloodDonationId,
        '#bloodDonationTable',
        'Blood Donation',
    );
});

$(document).ready(function () {
    $('#donorName,#editDonorName').select2({
        width: '100%',
    });
    $('#addModal, #editModal').on('shown.bs.modal', function () {
        $('#donorName, #editDonorName:first').focus();
    });
});
