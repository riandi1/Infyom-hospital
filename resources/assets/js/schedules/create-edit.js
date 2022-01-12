$(document).ready(function () {
    'use strict';

    $('#doctorId, #serialVisibilityId').select2({
        width: '100%',
    });
    $('.availableFrom, .availableTo, #perPatientTime').
        datetimepicker(DatetimepickerDefaults({
            format: 'HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            widgetPositioning: {
                horizontal: 'right',
                vertical: 'bottom',
            },
        }));
    $('#doctorId').first().focus();
    $(document).on('click', '.copy-btn', function (e) {
        e.preventDefault();
        let id = $(e.currentTarget).data('id');
        let oldId = id - 1;
        let availableFrom = $('#availableFrom-'.concat(oldId)).val();
        let availableTo = $('#availableTo-'.concat(oldId)).val();
        $('#availableFrom-'.concat(id)).val(availableFrom);
        $('#availableTo-'.concat(id)).val(availableTo);
    });

    $('#createScheduleForm').on('submit', function () {
        let perPatientTime = $('#perPatientTime').val();

        if (perPatientTime == '00:00:00') {
            $('#validationErrorsBox').
                html('Please select per patient time').show();
            return false;
        }

        let j = 0;
        let availableFrom = true;
        for (j; j <= 6; j++) {
            if ($('#availableFrom-' + j).val() != '00:00:00') {
                availableFrom = false;
            }
        }
        if (availableFrom) {
            $('#validationErrorsBox').
                html('Please select at least one available from time').show();
            return false;
        }

        let i = 0;
        let availableTo = true;
        for (i; i <= 6; i++) {
            if ($('#availableTo-' + i).val() != '00:00:00') {
                availableTo = false;
            }
        }
        if (availableTo) {
            $('#validationErrorsBox').
                html('Please select available to time').show();
            return false;
        }
    });
});
