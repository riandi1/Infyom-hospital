'use strict';

let tbl = $('#itemStocksTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[4, 'desc']],
    ajax: {
        url: itemStockUrl,
    },
    columnDefs: [
        {
            'targets': [5],
            'orderable': false,
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [2, 3],
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
                let showLink = itemStockUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.item.name +
                    '</a>';
            },
            name: 'item.name',
        },
        {
            data: 'item.itemcategory.name',
            name: 'item.itemcategory.name',
        },
        {
            data: 'quantity',
            name: 'quantity',
        },
        {
            data: function (row) {
                return !isEmpty(row.purchase_price) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.purchase_price) + '</p>' : 'N/A';
            },
            name: 'purchase_price',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.created_at === null) {
                    return 'N/A';
                }

                return moment(row.created_at).utc().format('Do MMM, Y');
            },
            name: 'created_at',
        },
        {
            data: function (row) {
                let url = itemStockUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'hasAttachment': !isEmpty(row.item_stock_url)
                            ? true
                            : false,
                        'attachmentSaveUrl': itemStockDownload + '/' + row.id,
                    }];
                return prepareTemplateRender('#itemStockActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let itemStockId = $(event.currentTarget).data('id');
    deleteItem(itemStockUrl + '/' + itemStockId, '#itemStocksTable',
        'Item Stock');
});
