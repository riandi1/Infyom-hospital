'use strict';

let tbl = $('#itemsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: itemUrl,
    },
    columnDefs: [
        {
            'targets': [4],
            'orderable': false,
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [2, 3],
            'width': '11%',
            'className': 'text-right',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = itemUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name +
                    '</a>';
            },
            name: 'name',
        },
        {
            data: 'itemcategory.name',
            name: 'itemcategory.name',
        },
        {
            data: 'unit',
            name: 'unit',
        },
        {
            data: 'available_quantity',
            name: 'available_quantity',
        },
        {
            data: function (row) {
                let url = itemUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#itemActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let itemId = $(event.currentTarget).data('id');
    deleteItem(itemUrl + '/' + itemId, '#itemsTable', 'Item');
});
