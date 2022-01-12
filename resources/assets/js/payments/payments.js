'use strict';

let tbl = $('#paymentsTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'desc']],
    ajax: {
        url: paymentUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [3],
            'className': 'text-right',
        },
        {
            'targets': [4],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: 'account.name',
            name: 'account.name',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.payment_date === null) {
                    return 'N/A';
                }

                return moment(row.payment_date).format('Do MMM, Y');
            },
            name: 'payment_date',
        },
        {
            data: 'pay_to',
            name: 'pay_to',
        },
        {
            data: function (row) {
                return !isEmpty(row.amount) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.amount) + '</p>' : 'N/A';
            },
            name: 'amount',
        },
        {
            data: function (row) {
                let url = paymentUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                    }];
                return prepareTemplateRender('#paymentActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let paymentId = $(event.currentTarget).data('id');
    deleteItem(paymentUrl + '/' + paymentId, '#paymentsTbl', 'Payment');
});
