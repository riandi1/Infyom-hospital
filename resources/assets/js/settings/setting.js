'use strict';
let tableName = '#modulesTbl';
let tbl = $(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: moduleUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [1],
            'className': 'text-center',
            'orderable': false,
            'width': '5%',
        },
    ],
    columns: [
        {
            data: 'name',
            name: 'name',
        },
        {
            data: function (row) {
                let checked = row.is_active == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#moduleStatusTemplate', data);
            },
            name: 'is_active',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});
$(document).ready(function () {
    $('#currencyType').select2({
        width: '100%',
    });
    $('#mySelect').selectpicker();

});

$(document).on('change', '#appLogo', function () {
    $('#validationErrorsBox').addClass('d-none');
    if (isValidLogo($(this), '#validationErrorsBox')) {
        displayLogo(this, '#previewImage');
    }
});

$('#createSetting').submit(function () {
    if ($('#error-msg').text() !== '') {
        $('#phoneNumber').focus();
        return false;
    }
});
$(document).on('change', '.status', function (event) {
    let moduleId = $(event.currentTarget).data('id');
    updateStatus(moduleId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: moduleUrl + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};

window.isValidLogo = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['jpg', 'png', 'jpeg']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).removeClass('d-none');
        $(validationMessageSelector).
            html('The image must be a file of type: jpg, jpeg, png.').
            show();
        return false;
    }
    $(validationMessageSelector).hide();
    return true;
};

window.displayLogo = function (input, selector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                if (image.height != 60 && image.width != 90) {
                    $(selector).val('');
                    $('#validationErrorsBox').removeClass('d-none');
                    $('#validationErrorsBox').
                        html(imageValidation).
                        show();
                    return false;
                }
                $(selector).attr('src', e.target.result);
                displayPreview = true;
            };
        };
        if (displayPreview) {
            reader.readAsDataURL(input.files[0]);
            $(selector).show();
        }
    }
};
