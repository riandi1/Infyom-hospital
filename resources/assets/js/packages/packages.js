'use strict';

let tbl = $('#packagesReportTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: packageReportUrl,
    },
    columnDefs: [
        {
            'targets': [3],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [1, 2],
            'className': 'text-right',
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
                let showLink = packageReportUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name + '</a>';
            },
            name: 'name',
        },
        {
            data: function (row) {
                return row.discount + '%';
            },
            name: 'discount',
        },
        {
            data: function (row) {
                return !isEmpty(row.total_amount) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.total_amount) + '</p>' : 'N/A';
            },
            name: 'total_amount',
        },
        {
            data: function (row) {
                let url = packageReportUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender(
                    '#packagesReportActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let packageId = $(event.currentTarget).data('id');
    deleteItem(
        packageReportUrl + '/' + packageId,
        '#packagesReportTable',
        'Package',
    );
});
