'use strict';

let tableName = '#callLogTbl';
let tbl = $('#callLogTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: callLogUrl,
        data: function (data) {
            data.call_type = $('#callType').find('option:selected').val();
        },
    },
    columnDefs: [
        {
            'targets': [5],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
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
            data: function (row) {
                return isEmpty(row.phone) ? 'N/A' : row.phone;
            },
            name: 'phone',
        },
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
                return row;
            },
            render: function (row) {
                if (row.follow_up_date === null) {
                    return 'N/A';
                }

                return moment(row.follow_up_date).format('Do MMM, Y');
            },
            name: 'follow_up_date',
        },
        {
            data: function (row) {
                if (row.call_type == callTypeIncoming) {
                    return incoming;
                } else {
                    return outgoing;
                }
            },
            name: 'call_type',
        },
        {
            data: function (row) {
                let url = callLogUrl + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#callLogActionTemplate', data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#callType').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$('#callType').select2();

$(document).on('click', '.delete-btn', function (event) {
    let callLogId = $(event.currentTarget).data('id');
    deleteItem(callLogUrl + callLogId, tableName, 'Call Log');
});

