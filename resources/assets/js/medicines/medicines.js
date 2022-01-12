'use strict';

let tableName = '#tblMedicines';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: medicineUrl,
    },
    columnDefs: [
        {
            'targets': [4],
            'orderable': false,
            'class': 'text-center',
            'width': '8%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [2,3],
            'className': 'text-right',
        },
    ],
    columns: [
        {
            data: function (row) {
                let url = medicineUrl + '/' + row.id;
                return '<a href="' + url + '">' + row.name + '</a>';
            },
            name: 'name',
        },
        {
            data: 'brand.name',
            name: 'brand.name',
        },
        {
            data: function (row) {
                return !isEmpty(row.selling_price) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.selling_price) + '</p>' : 'N/A';
            },
            name: 'selling_price',
        },
        {
            data: function (row) {
                return !isEmpty(row.buying_price) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.buying_price) + '</p>' : 'N/A';
            },
            name: 'buying_price',
        },
        {
            data: function (row) {
                let data = [
                    {
                        'id': row.id,
                        'url': medicineUrl + '/' + row.id + '/edit',
                    }];
                return prepareTemplateRender('#medicineActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let id = $(event.currentTarget).data('id');
    deleteItem(medicineUrl + '/' + id, tableName, 'Medicine');
});
