'use strict';

let tableName = '#radiologyTestsTable';
let tbl = $('#radiologyTestsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc'], [3, 'asc']],
    ajax: {
        url: radiologyTestUrl,
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
            data: function (row) {
                let showLink = radiologyTestUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.test_name +
                    '</a>';
            },
            name: 'test_name',
        },
        {
            data: 'short_name',
            name: 'short_name',
        },
        {
            data: 'test_type',
            name: 'test_type',
        },
        {
            data: 'radiologycategory.name',
            name: 'radiologycategory.name',
        },
        {
            data: 'chargecategory.name',
            name: 'chargecategory.name',
        },
        {
            data: function (row) {
                let url = radiologyTestUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#radiologyTestActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let radiologyTestId = $(event.currentTarget).data('id');
    deleteItem(radiologyTestUrl + '/' + radiologyTestId, '#radiologyTestsTable',
        'Radiology Test');
});
