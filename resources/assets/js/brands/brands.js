'use strict';

let tbl = $('#brandsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: brandUrl,
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
    ],
    columns: [
        {
            data: function (row) {
                let showLink = brandUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name +
                    '</a>';
            },
            name: 'name',
        },
        {
            data: function (row) {
                return isEmpty(row.email) ? 'N/A' : row.email;
            },
            name: 'email',
        },
        {
            data: function (row) {
                return isEmpty(row.phone) ? 'N/A' : row.phone;
            },
            name: 'phone',
        },
        {
            data: function (row) {
                let url = brandUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#brandActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let brandId = $(event.currentTarget).data('id');
    deleteItem(brandUrl + '/' + brandId, '#brandsTable', 'Medicine Brand');
});
