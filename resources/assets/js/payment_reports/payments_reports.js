'use strict';

let tableName = '#paymentsReportsTbl';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: paymentReportUrl,
        data: function (data) {
            data.account_type = $('#filterPaymentAccount').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [4],
            'className': 'text-right',
        },
    ],
    columns: [
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
            data: 'accounts.name',
            name: 'accounts.name',
        },
        {
            data: 'pay_to',
            name: 'pay_to',
        },
        {
            data: function (row) {
                return ((row.accounts.type) == 2) ? 'Credit' : 'Debit';
            },
            name: 'accounts.type',
        },
        {
            data: function (row) {
                return !isEmpty(row.amount) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.amount) + '</p>' : 'N/A';
            },
            name: 'amount',
        },
    ],
    'fnInitComplete': function () {
        $('#filterPaymentAccount').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$('#filterPaymentAccount').select2({
    width: '100%',
});
