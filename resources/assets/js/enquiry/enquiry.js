$(document).ready(function () {
    'use strict';

    $('#type,#filter_status').select2({
        width: '100%',
    });

    let tableName = '#enquiriesTable';
    let tbl = $('#enquiriesTable').DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: enquiryUrl,
            data: function (data) {
                data.status = $('#filter_status').
                    find('option:selected').
                    val();
            },
        },
        columnDefs: [
            {
                'targets': [5],
                'orderable': false,
                'className': 'text-center',
                'width': '4%',
            },
            {
                'targets': [6],
                'orderable': false,
                'className': 'text-center',
                'width': '8%',
            },
            {
                'targets': [0],
                'width': '20%',
            },
            {
                'targets': [1, 2],
                'width': '15%',
            },
            {
                'searchable': true,
                'orderable': true,
                'targets': 2,
            },
        ],
        columns: [
            {
                data: 'full_name',
                name: 'full_name',
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: function (row) {
                    console.log(row);
                    return row.enquiry_type;
                },
                name: 'type',
            },
            {
                data: function (row) {
                    return row;
                },
                render: function (row) {
                    if (row.created_at === null) {
                        return 'N/A';
                    }

                    return moment(row.created_at).
                        utc().
                        format('Do MMM, Y h:mm A');
                },
                name: 'created_at',
            },
            {
                data: function (row) {
                    if (row.viewed_by === null)
                        return 'Not viewed';
                    else
                        return row.user.full_name;
                },
                name: 'user.first_name',
            },
            {
                data: function (row) {
                    let checked = row.status == 0 ? '' : 'checked';
                    let data = [{ 'id': row.id, 'checked': checked }];
                    return prepareTemplateRender('#enquiryStatusTemplate',
                        data);
                },
                name: 'status',
            },
            {
                data: function (row) {
                    let showLink = enquiryShowUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': showLink,
                        }];
                    return prepareTemplateRender('#enquiryActionTemplate',
                        data);
                }, name: 'user.last_name',
            },
        ],
        'fnInitComplete': function () {
            $('#filter_status').change(function () {
                $(tableName).DataTable().ajax.reload(null, true);
            });
        },
    });

    $(document).on('change', '.status', function (event) {
        let enquiryId = $(event.currentTarget).data('id');
        updateStatus(enquiryId);
    });

    window.updateStatus = function (id) {
        $.ajax({
            url: enquiryUrl + '/' + +id + '/active-deactive',
            method: 'post',
            cache: false,
            success: function (result) {
                if (result.success) {
                    tbl.ajax.reload(null, false);
                }
            },
        });
    };

});
