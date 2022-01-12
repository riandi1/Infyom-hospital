'use strict';
let tableName = '#tblInvoices';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[2, 'desc']],
    ajax: {
        url: invoiceUrl,
        data: function (data) {
            data.status = $('#status_filter').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [0],
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [3],
            'className': 'text-right',
            'width': '10%',
        },
        {
            'targets': [4],
            'className': 'text-left',
            'width': '8%',
        },
        {
            'targets': [5],
            'visible': false,
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = invoiceUrl + '/' + row.id;
                return '<a href="' + showLink + '">' +
                    row.invoice_id + '</a>';
            },
            name: 'invoice_id',
        },
        {
            data: function (row) {
                let showLink = patientUrl + '/' + row.patient.id;
                return '<a href="' + showLink + '">' +
                    row.patient.user.full_name + '</a>';
            },
            name: 'id',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.invoice_date === null) {
                    return 'N/A';
                }

                return moment(row.invoice_date).format('Do MMM, Y');
            },
            name: 'invoice_date',
        },
        {
            data: function (row) {
                return !isEmpty(row.amount) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas((row.amount -
                        (row.amount * row.discount / 100)).toFixed(
                        2)) + '</p>' : 'N/A';
            },
            name: 'amount',
        },
        {
            data: 'status_label',
            name: 'status',
        },
        {
            data: 'patient.user.first_name',
            name: 'patient.user.first_name',
        },
    ],
    'fnInitComplete': function () {
        $('#status_filter').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
            $(tableName).DataTable().page('previous').draw('page');
        });
    },
});

$('#status_filter').select2({
    width: '100%',
});
