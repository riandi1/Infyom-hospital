$(document).ready(function () {
    'use strict';

    let tableName = '#tblIpdPayments';
    $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[1, 'desc']],
        ajax: {
            url: ipdPaymentUrl,
            data: function (data) {
                data.id = ipdPatientDepartmentId;
            },
        },
        columnDefs: [
            {
                'targets': [0, 1, 2],
                'width': '10%',
            },
            {
                'targets': [0],
                'className': 'text-right',
            },
            {
                'targets': [3],
                'width': '5%',
            },
            {
                'targets': [4],
                'width': '20%',
            },
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return !isEmpty(row.amount)
                        ? '<p class="cur-margin">' +
                        getCurrentCurrencyClass() + ' ' +
                        addCommas(row.amount) + '</p>'
                        : 'N/A';
                },
                name: 'amount',
            },
            {
                data: function (row) {
                    return row;
                },
                render: function (row) {
                    if (row.date === null) {
                        return 'N/A';
                    }

                    return moment(row.date).format('Do MMM, Y h:mm A');
                },
                name: 'date',
            },
            {
                data: function (row) {
                    return ipdPaymentModes[row.payment_mode];
                },
                name: 'payment_mode',
            },
            {
                data: function (row) {
                    if (row.ipd_payment_document_url != '') {
                        let downloadLink = downloadPaymetDocumentUrl + '/' +
                            row.id;
                        return '<a href="' + downloadLink + '">' + 'Download' +
                            '</a>';
                    } else
                        return 'N/A';
                },
                name: 'id',
            },
            {
                data: 'notes',
                name: 'notes',
            },
        ],
    });
});
