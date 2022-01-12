$(document).ready(function () {
    'use strict';

    $('#addModal, #editModal').on('shown.bs.modal', function () {
        $('#doctorId, #editDoctorId:first').focus();
    });

    $('#doctorId, #editDoctorId').select2({
        width: '100%',
    });
    let tableName = '#doctorOPDChargeTable';
    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: doctorOPDChargeUrl,
        },
        columnDefs: [
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '10%',
            },
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
            {
                'targets': [1],
                'className': 'text-right',
                'width': '15%',
            },
        ],
        columns: [
            {
                data: 'doctor.user.full_name',
                name: 'doctor.user.first_name',
            },
            {
                data: function (row) {
                    return !isEmpty(row.standard_charge)
                        ? '<p class="cur-margin">' +
                        getCurrentCurrencyClass() + ' ' +
                        addCommas(row.standard_charge) + '</p>'
                        : 'N/A';
                },
                name: 'standard_charge',
            },
            {
                data: function (row) {
                    let data = [{ 'id': row.id }];
                    return prepareTemplateRender('#doctorOPDChargeTemplate',
                        data);
                }, name: 'id',
            },
        ],
    });

    $(document).on('submit', '#addNewForm', function (event) {
        event.preventDefault();
        var loadingButton = jQuery(this).find('#btnSave');
        loadingButton.button('loading');
        $.ajax({
            url: doctorOPDChargeCreateUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#addModal').modal('hide');
                    tbl.ajax.reload(null, false);
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

    $(document).on('click', '.delete-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        deleteItem(doctorOPDChargeUrl + '/' + id, tableName,
            'Doctor OPD Charge');
    });

    $(document).on('click', '.edit-btn', function (event) {
        let doctorOPDChargeId = $(event.currentTarget).data('id');
        renderData(doctorOPDChargeId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: doctorOPDChargeUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#doctorOPDChargeId').val(result.data.id);
                    $('#editDoctorId').
                        val(result.data.doctor_id).
                        trigger('change.select2');
                    $('#editStandardCharge').val(result.data.standard_charge);
                    $('.price-input').trigger('input');
                    $('#editModal').modal('show');
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };

    $(document).on('submit', '#editForm', function (event) {
        event.preventDefault();
        var loadingButton = jQuery(this).find('#btnEditSave');
        loadingButton.button('loading');
        let id = $('#doctorOPDChargeId').val();
        $.ajax({
            url: doctorOPDChargeUrl + '/' + id,
            type: 'patch',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#editModal').modal('hide');
                    $(tableName).DataTable().ajax.reload(null, false);
                }
            },
            error: function (result) {
                UnprocessableInputError(result);
            },
            complete: function () {
                loadingButton.button('reset');
            },
        });
    });

    $('#addModal').on('hidden.bs.modal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
        $('#doctorId').val('').trigger('change.select2');
    });

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox');
    });

});
