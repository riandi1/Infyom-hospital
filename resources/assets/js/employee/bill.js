'use strict';

let tableName = '#tblBills';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'desc']],
    ajax: {
        url: billUrl,
    },
    columnDefs: [
        {
            'targets': [0],
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [3],
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
                let showLink = billUrl + '/' + row.id;
                return '<a href="' + showLink + '">' +
                    row.bill_id + '</a>';
            },
            name: 'bill_id',
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
                if (row.bill_date === null) {
                    return 'N/A';
                }

                return moment(row.bill_date).utc().format('Do MMM, Y h:mm A');
            },
            name: 'bill_date',
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
});
