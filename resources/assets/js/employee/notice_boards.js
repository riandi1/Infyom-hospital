'use strict';

let tbl = $('#employeeNoticeBoardsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'desc']],
    ajax: {
        url: noticeBoardUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = noticeBoardShowUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.title + '</a>';
            },
            name: 'title',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.created_at === null) {
                    return 'N/A';
                }

                return moment(row.created_at).utc().format('Do MMM, Y h:mm A');
            },
            name: 'created_at',
        },
    ],
});
