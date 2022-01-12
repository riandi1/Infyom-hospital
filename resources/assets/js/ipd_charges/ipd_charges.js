$(document).ready(function () {
    'use strict';

    let tableName = '#tblIpdCharges';
    $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: ipdChargesUrl,
            data: function (data) {
                data.id = ipdPatientDepartmentId;
            },
        },
        columnDefs: [
            {
                'targets': [0, 1, 2, 3],
                'width': '15%',
            },
            {
                'targets': [4, 5],
                'className': 'text-right',
                'width': '15%',
            },
            {
                'targets': [6],
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
                    if (row.charge_type_id === 1)
                        return 'Procedures';
                    else if (row.charge_type_id === 2)
                        return 'Investigations';
                    else if (row.charge_type_id === 3)
                        return 'Supplier';
                    else if (row.charge_type_id === 4)
                        return 'Operation Theatre';
                    else
                        return 'Others';
                },
                name: 'charge_type_id',
            },
            {
                data: 'chargecategory.name',
                name: 'chargecategory.name',
            },
            {
                data: 'charge.code',
                name: 'charge.code',
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
                    return !isEmpty(row.applied_charge)
                        ? '<p class="cur-margin">' +
                        getCurrentCurrencyClass() + ' ' +
                        addCommas(row.applied_charge) + '</p>'
                        : 'N/A';
                },
                name: 'applied_charge',
            },
            {
                data: function (row) {
                    let data = [{ 'id': row.id }];
                    return prepareTemplateRender(
                        '#ipdChargesActionTemplate',
                        data);
                }, name: 'id',
            },
        ],
    });
    $('#btnIpdChargeSave,#btnEditCharges').prop('disabled', true);
    $('#ipdChargeDate, #ipdEditChargeDate').
        datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            sideBySide: true,
            minDate: ipdPatientCaseDate,
        }));
    $('#chargeTypeId, #chargeCategoryId, #chargeId, #editChargeTypeId, #editChargeCategoryId, #editChargeId').
        select2({
            width: '100%',
        });

    $(document).on('click', '.ipdCharegs-delete-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        let url = ipdChargesUrl + '/' + id;
        let header = 'IPD Charge';
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
        }, function () {
            deleteItemAjax(url, tableName, header);
        });
    });

    $('#chargeTypeId, #editChargeTypeId').
        on('change', function (e, onceOnEditRender) {
            let isChargeEdit = $(this).data('is-charge-edit');
            if ($(this).val() !== '') {
                $.ajax({
                    url: chargeCategoryUrl,
                    type: 'get',
                    dataType: 'json',
                    data: { id: $(this).val() },
                    beforeSend: function () {
                        makeChargesBtnDisabled(isChargeEdit);
                    },
                    success: function (data) {
                        if (data.data.length !== 0) {
                            $((!isChargeEdit)
                                ? '#chargeCategoryId'
                                : '#editChargeCategoryId').empty();
                            $((!isChargeEdit)
                                ? '#chargeCategoryId'
                                : '#editChargeCategoryId').
                                removeAttr('disabled');
                            $.each(data.data, function (i, v) {
                                $((!isChargeEdit)
                                    ? '#chargeCategoryId'
                                    : '#editChargeCategoryId').
                                    append($('<option></option>').
                                        attr('value', i).
                                        text(v));
                            });
                            if (!isChargeEdit)
                                $('#chargeCategoryId').trigger('change');
                            else {
                                if (typeof onceOnEditRender == 'undefined')
                                    $('#editChargeCategoryId').
                                        trigger('change');
                                else {
                                    $('#editChargeCategoryId').
                                        val(editChargeCategoryId).
                                        trigger('change', onceOnEditRender);
                                }
                            }
                            $((!isChargeEdit)
                                ? '#btnIpdChargeSave'
                                : '#btnEditCharges').prop('disabled', false);
                        } else {
                            $((!isChargeEdit)
                                ? '#chargeCategoryId, #chargeId'
                                : '#editChargeCategoryId, #editChargeId').
                                empty();
                            $((!isChargeEdit)
                                ? '#ipdStandardCharge, #ipdAppliedCharge'
                                : '#editIpdStandardCharge, #editIpdAppliedCharge').
                                val('');
                            $((!isChargeEdit)
                                ? '#chargeCategoryId, #chargeId, #btnIpdChargeSave'
                                : '#editChargeCategoryId, #editChargeId, #btnEditCharges').
                                prop('disabled', true);
                        }
                    },
                });
            }
            $((!isChargeEdit)
                ? '#chargeCategoryId, #chargeId'
                : '#editChargeCategoryId, #editChargeId').empty();
            $((!isChargeEdit)
                ? '#ipdStandardCharge, #ipdAppliedCharge'
                : '#editIpdStandardCharge, #editIpdAppliedCharge').val('');
            $((!isChargeEdit)
                ? '#chargeCategoryId, #chargeId'
                : '#editChargeCategoryId, #editChargeId').
                prop('disabled', true);
        });

    $('#chargeCategoryId, #editChargeCategoryId').
        on('change', function (e, onceOnEditRender) {
            let isChargeEdit = $(this).data('is-charge-edit');
            if ($(this).val() !== '') {
                $.ajax({
                    url: chargeUrl,
                    type: 'get',
                    dataType: 'json',
                    data: { id: $(this).val() },
                    beforeSend: function () {
                        makeChargesBtnDisabled(isChargeEdit);
                    },
                    success: function (data) {
                        if (data.data.length !== 0) {
                            $((!isChargeEdit) ? '#chargeId' : '#editChargeId').
                                empty();
                            $((!isChargeEdit) ? '#chargeId' : '#editChargeId').
                                removeAttr('disabled');
                            $.each(data.data, function (i, v) {
                                $((!isChargeEdit)
                                    ? '#chargeId'
                                    : '#editChargeId').
                                    append($('<option></option>').
                                        attr('value', i).
                                        text(v));
                            });
                            if (!isChargeEdit)
                                $('#chargeId').trigger('change');
                            else {
                                if (typeof onceOnEditRender == 'undefined')
                                    $('#editChargeId').trigger('change');
                                else
                                    $('#editChargeId').
                                        val(editChargeId).
                                        trigger('change', onceOnEditRender);
                            }
                        } else {
                            $((!isChargeEdit) ? '#chargeId' : '#editChargeId').
                                prop('disabled', true);
                        }
                    },
                });
            }
            $((!isChargeEdit) ? '#chargeId' : '#editChargeId').empty();
            $((!isChargeEdit) ? '#chargeId' : '#editChargeId').
                prop('disabled', true);
        });

    $('#chargeId, #editChargeId').on('change', function (e, onceOnEditRender) {
        let isChargeEdit = $(this).data('is-charge-edit');
        $.ajax({
            url: chargeStandardRateUrl,
            type: 'get',
            dataType: 'json',
            data: {
                id: $(this).val(),
                isEdit: isChargeEdit,
                onceOnEditRender: onceOnEditRender,
                ipdChargeId: $('#ipdChargesId').val(),
            },
            beforeSend: function () {
                makeChargesBtnDisabled(isChargeEdit);
            },
            success: function (data) {
                if (!isChargeEdit) {
                    $('#ipdStandardCharge, #ipdAppliedCharge').val(data.data);
                    $('#btnIpdChargeSave').prop('disabled', false);
                } else {
                    if (data.data != null) {
                        $('#editIpdStandardCharge').
                            val(data.data.standard_charge);
                        $('#editIpdAppliedCharge').
                            val(data.data.applied_charge);
                        $('.price-input').trigger('input');
                        $('#btnEditCharges').prop('disabled', false);
                    }
                }

            },
        });
    });

    $(document).on('submit', '#addIpdChargeNewForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnIpdChargeSave');
        loadingButton.button('loading');

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: ipdChargesCreateUrl,
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function success (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#addIpdChargesModal').modal('hide');
                    location.reload();
                }
            },
            error: function error (result) {
                printErrorMessage('#ipdChargevalidationErrorsBox', result);
            },
            complete: function complete () {
                loadingButton.button('reset');
                $('#btnIpdChargeSave').attr('disabled', true);
            },
        });

    });

    $(document).on('click', '.edit-charges-btn', function (event) {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let ipdChargesId = $(event.currentTarget).data('id');
        renderChargesData(ipdChargesId);
    });

    let editChargeCategoryId = null;
    let editChargeId = null;
    let editStandardRate = null;
    let editAppliedCharge = null;
    window.renderChargesData = function (id) {
        $.ajax({
            url: ipdChargesUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    editChargeCategoryId = result.data.charge_category_id;
                    editChargeId = result.data.charge_id;
                    editStandardRate = result.data.standard_charge;
                    editAppliedCharge = result.data.applied_charge;
                    $('#ipdChargesId').val(result.data.id);
                    $('#ipdEditChargeDate').val(result.data.date);
                    $('#editChargeTypeId').
                        val(result.data.charge_type_id).
                        trigger('change', [{ onceOnEditRender: true }]);
                    $('.price-input').trigger('input');
                    $('#appliedChargeId').text(editAppliedCharge);
                    $('#editIpdChargesModal').modal('show');
                    ajaxCallCompleted();
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };

    $(document).on('submit', '#editIpdChargesForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnEditCharges');
        loadingButton.button('loading');
        let id = $('#ipdChargesId').val();
        let url = ipdChargesUrl + '/' + id;
        let data = {
            'formSelector': $(this),
            'url': url,
            'type': 'POST',
            'tableSelector': tableName,
        };
        editRecord(data, loadingButton, '#editIpdChargesModal',
            '#btnEditCharges');
        location.reload();
    });

    $('#addIpdChargesModal').on('hidden.bs.modal', function () {
        $('#addIpdChargeNewForm')[0].reset();
        $('#chargeTypeId, #chargeCategoryId, #chargeId, #ipdStandardCharge, #ipdAppliedCharge').
            val('');
        $('#chargeCategoryId, #chargeId').empty();
        $('#chargeTypeId').trigger('change.select2');
        $('#btnIpdChargeSave').prop('disabled', true);
    });
    $('#editIpdChargesModal').on('hidden.bs.modal', function () {
        $('#btnEditCharges').prop('disabled', true);
    });
});

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

window.makeChargesBtnDisabled = function (isChargeOnEdit) {
    $((!isChargeOnEdit) ? '#btnIpdChargeSave' : '#btnEditCharges').
        prop('disabled', true);
};
