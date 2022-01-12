'use strict';

let tableName = '#ambulanceCallsTbl';
let tbl = $('#ambulanceCallsTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[3, 'desc']],
    ajax: {
        url: ambulanceCallUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [4],
            'className': 'text-right',
        },
        {
            'targets': [5],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = patientUrl + '/' + row.patient.id;
                return '<a href="' + showLink + '">' +
                    row.patient.user.full_name + '</a>';
            },
            name: 'patient.user.first_name',
        },
        {
            data: 'ambulance.vehicle_model',
            name: 'ambulance.vehicle_model',
        },
        {
            data: 'driver_name',
            name: 'driver_name',
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
                let url = ambulanceCallUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                    }];
                return prepareTemplateRender('#ambulanceCallsActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let ambulanceCallId = $(event.currentTarget).data('id');
    deleteItem(ambulanceCallUrl + '/' + ambulanceCallId, '#ambulanceCallsTbl',
        'Ambulance Call');
});
