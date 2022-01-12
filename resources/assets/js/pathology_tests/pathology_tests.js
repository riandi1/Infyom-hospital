'use strict';

let tableName = '#pathologyTestsTable';
let tbl = $('#pathologyTestsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc'], [3, 'asc']],
    ajax: {
        url: pathologyTestUrl,
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
                let showLink = pathologyTestUrl + '/' + row.id;
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
            data: 'pathologycategory.name',
            name: 'pathologycategory.name',
        },
        {
            data: 'chargecategory.name',
            name: 'chargecategory.name',
        },
        {
            data: function (row) {
                let url = pathologyTestUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#pathologyTestActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let pathologyTestId = $(event.currentTarget).data('id');
    deleteItem(pathologyTestUrl + '/' + pathologyTestId, '#pathologyTestsTable',
        'Pathology Test');
});
