'use strict';

let tbl = $('#advancedPaymentsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[3, 'desc']],
    ajax: {
        url: advancedPaymentUrl,
    },
    columnDefs: [
        {
            'targets': [0],
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [4],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [3],
            'className': 'text-right',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = advancedPaymentUrl + '/' + row.id;
                return '<a href="' + showLink + '">' +
                    row.receipt_no + '</a>';
            },
            name: 'receipt_no',
        },
        {
            data: function (row) {
                let showLink = patientUrl + '/' + row.patient.id;
                return '<a href="' + showLink + '">' +
                    row.patient.user.full_name + '</a>';
            },
            name: 'patient.user.first_name',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.date === null) {
                    return 'N/A';
                }

                return moment(row.date).format('Do MMM, Y');
            },
            name: 'date',
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
                let url = advancedPaymentUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                    }];
                return prepareTemplateRender('#advancedPaymentActionTemplate',
                    data);
            }, name: 'patient.user.last_name',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let advancedPaymentId = $(event.currentTarget).data('id');
    deleteItem(advancedPaymentUrl + '/' + advancedPaymentId,
        '#advancedPaymentsTable', 'Advanced Payment');
});
