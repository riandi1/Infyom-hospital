'use strict';

let tbl = $('#noticeBoardsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'desc']],
    ajax: {
        url: noticeBoardUrl,
    },
    columnDefs: [
        {
            'targets': [2],
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
            data: function (row) {
                let showLink = noticeBoardUrl + '/' + row.id;
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

                return moment(row.created_at).format('Do MMM, Y h:mm A');
            },
            name: 'created_at',
        },
        {
            data: function (row) {
                let url = noticeBoardUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#noticeBoardActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let noticeBoardId = $(event.currentTarget).data('id');
    deleteItem(
        noticeBoardUrl + '/' + noticeBoardId,
        '#noticeBoardsTable',
        'Notice Board',
    );
});
