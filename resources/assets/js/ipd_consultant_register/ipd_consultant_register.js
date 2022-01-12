$(document).ready(function () {
    'use strict';

    let tableName = '#tblIpdConsultantRegisters';
    $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: ipdConsultantRegisterUrl,
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
                'targets': [3],
                'className': 'text-center',
                'orderable': false,
                'width': '4%',
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
                    if (row.applied_date === null) {
                        return 'N/A';
                    }

                    return moment(row.applied_date).format('Do MMM, Y h:mm A');
                },
                name: 'applied_date',
            },
            {
                data: function (row) {
                    let showLink = doctorUrl + '/' + row.doctor_id;
                    return '<a href="' + showLink + '">' +
                        row.doctor.user.full_name +
                        '</a>';
                },
                name: 'doctor.user.first_name',
            },
            {
                data: function (row) {
                    return row;
                },
                render: function (row) {
                    if (row.instruction_date === null) {
                        return 'N/A';
                    }

                    return moment(row.instruction_date).format('Do MMM, Y');
                },
                name: 'instruction_date',
            },
            {
                data: function (row) {
                    let data = [{ 'id': row.id }];
                    return prepareTemplateRender(
                        '#ipdConsultantRegisterActionTemplate',
                        data);
                }, name: 'doctor.user.last_name',
            },
        ],
    });

    const addDateTimePicker = () => {
        $('.appliedDate').datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false,
            sideBySide: true,
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom',
            },
            minDate: ipdPatientCaseDate,
        }));

        $('.instructionDate').datetimepicker(DatetimepickerDefaults({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            sideBySide: true,
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom',
            },
            minDate: ipdPatientCaseDate,
        }));
    };

    addDateTimePicker();

    const dropdownToSelect2 = (selector) => {
        $(selector).select2({
            placeholder: 'Select Doctor',
            width: '100%',
        });
    };

    dropdownToSelect2('.doctorId');

    $(document).on('click', '#addItem', function () {
        let data = {
            'doctors': doctors,
            'uniqueId': uniqueId,
        };
        let ipdConsultantItemHtml = prepareTemplateRender(
            '#ipdConsultantInstructionItemTemplate', data);
        $('.ipd-consultant-item-container').append(ipdConsultantItemHtml);
        dropdownToSelect2('.doctorId');
        addDateTimePicker();
        uniqueId++;

        resetIpdConsultantItemIndex();
    });

    const resetIpdConsultantItemIndex = () => {
        let index = 1;
        $('.ipd-consultant-item-container>tr').each(function () {
            $(this).find('.item-number').text(index);
            index++;
        });
        if (index - 1 == 0) {
            let data = {
                'doctors': doctors,
                'uniqueId': uniqueId,
            };
            let ipdConsultantItemHtml = prepareTemplateRender(
                '#ipdConsultantInstructionItemTemplate', data);
            $('.ipd-consultant-item-container').append(ipdConsultantItemHtml);
            dropdownToSelect2('.doctorId');
            uniqueId++;
        }
    };

    $(document).on('click', '.deleteIpdConsultantInstruction', function () {
        $(this).parents('tr').remove();
        resetIpdConsultantItemIndex();
    });

    $(document).on('click', '.delete-consultant-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        deleteItem(ipdConsultantRegisterUrl + '/' + id, tableName,
            'IPD Consultant Instruction');
    });

    $(document).on('submit', '#addIpdConsultantNewForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnIpdConsultantSave');
        loadingButton.button('loading');
        let data = {
            'formSelector': $(this),
            'url': ipdConsultantRegisterCreateUrl,
            'type': 'POST',
            'tableSelector': tableName,
        };
        newRecord(data, loadingButton, '#addConsultantInstructionModal');
    });

    $(document).on('click', '.edit-consultant-btn', function (event) {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let ipdConsultantId = $(event.currentTarget).data('id');
        renderConsultantData(ipdConsultantId);
    });

    window.renderConsultantData = function (id) {
        $.ajax({
            url: ipdConsultantRegisterUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#ipdEditConsultantId').val(result.data.id);
                    $('#ipdEditAppliedDate').val(result.data.applied_date);
                    $('#editDoctorId').
                        val(result.data.doctor_id).
                        trigger('change.select2');
                    $('#editInstructionDate').val(result.data.instruction_date);
                    $('#editConsultantInstruction').
                        val(result.data.instruction);
                    $('#editIpdConsultantInstructionModal').modal('show');
                    ajaxCallCompleted();
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };

    $(document).on('submit', '#editIpdConsultantNewForm', function (event) {
        event.preventDefault();
        let loadingButton = jQuery(this).find('#btnEditIpdConsultantSave');
        loadingButton.button('loading');
        let id = $('#ipdEditConsultantId').val();
        let url = ipdConsultantRegisterUrl + '/' + id;
        let data = {
            'formSelector': $(this),
            'url': url,
            'type': 'POST',
            'tableSelector': tableName,
        };
        editRecord(data, loadingButton, '#editIpdConsultantInstructionModal');
    });

    $('#addConsultantInstructionModal').on('hidden.bs.modal', function () {
        resetModalForm('#addIpdConsultantNewForm', '#validationErrorsBox');
        $('#ipdConsultantInstructionTbl').find('tr:gt(1)').remove();
        $('.doctorId').val('');
        $('.doctorId').trigger('change');
    });
});
