$(document).ready(function () {
    'use strict';

    $('#userId, #roleId').select2({
        width: '100%',
    });

    let tableName = '#smsTable';
    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: smsUrl,
        },
        columnDefs: [
            {
                'targets': [3],
                'orderable': false,
                'className': 'text-center',
                'width': '10%',
            },
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
            {
                'targets': [4],
                'visible': false,
            },
        ],
        columns: [
            {
                data: function (row) {
                    let showLink = smsUrl + '/' + row.id;
                    if (row.user != null) {
                        return '<a href="' + showLink + '">' +
                            row.user.full_name + '</a>';
                    } else {
                        return 'N/A';
                    }
                },
                name: 'user.first_name',
            },
            {
                data: function (row) {
                    return isEmpty(row.region_code) ? row.phone_number : '+' +
                        row.region_code + row.phone_number;
                },
                name: 'phone_number',
            },
            {
                data: 'send_by.full_name',
                name: 'sendBy.first_name',
            },
            {
                data: function (row) {
                    let data = [{ 'id': row.id }];
                    return prepareTemplateRender('#smsTemplate',
                        data);
                }, name: 'id',
            },
            {
                data: 'send_by.last_name',
                name: 'sendBy.last_name',
            },
        ],
    });

    $('#messageId').keypress(function (e) {
        var tval = $('#messageId').val(),
            tlength = tval.length,
            set = 160,
            remain = parseInt(set - tlength);
        if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
            $('#messageId').val((tval).substring(0, tlength - 1));
            $('#validationErrorsBox').
                html('The message may not be greater than 160 characters.').
                show();
        }
    });

    $(document).on('submit', '#addNewForm', function (event) {
        event.preventDefault();
        var loadingButton = jQuery(this).find('#btnSave');
        loadingButton.button('loading');
        if ($('#number').is(':checked')) {
            $('#roleId').remove();
            $('#userId').remove();
        }
        $.ajax({
            url: createSmsUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#AddModal').modal('hide');
                    tbl.ajax.reload();
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
        deleteItem(smsUrl + '/' + id, tableName, 'SMS');
    });

    $('#AddModal').on('hidden.bs.modal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
        $('#userId').val('').trigger('change.select2');
        $('#roleId').val('').trigger('change.select2');
        hide();
    });

    $('.myclass').hide();
    $('#phoneNumber').prop('required', false);
    $(document).on('click', '.number', function () {
        if ($('.number').is(':checked')) {
            $('.myclass').show();
            $('.number').attr('value', 1);
            $('.role').hide();
            $('#roleId').prop('required', false);
            $('.send').hide();
            $('#userId').prop('required', false);
            $('#phoneNumber').prop('required', true);
        } else {
            $('#phoneNumber').prop('required', false);
            hide();
        }
    });

    function hide () {
        $('.myclass').hide();
        $('.number').attr('value', 0);
        $('.role').show();
        $('.send').show();
    }
});

$('#roleId').on('change', function () {
    if ($(this).val() !== '') {
        $.ajax({
            url: getUsersListUrl,
            type: 'get',
            dataType: 'json',
            data: { id: $(this).val() },
            success: function (data) {
                $('#userId').empty();
                $('#userId').removeAttr('disabled');
                $.each(data.data, function (i, v) {
                    $('#userId').
                        append($('<option></option>').attr('value', i).text(v));
                });
            },
        });
    }
    $('#userId').empty();
    $('#userId').prop('disabled', true);
});
