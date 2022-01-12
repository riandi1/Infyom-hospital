'use strict';

let tbl = $('#patientVaccinatedTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[3, 'desc']],
    ajax: {
        url: patientVaccinatedUrl,
    },
    columnDefs: [
        {
            'targets': [3],
            'width': '12%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: 'vaccination.name',
            name: 'vaccination.name',
        },
        {
            data: 'vaccination_serial_number',
            name: 'vaccination_serial_number',
        },
        {
            data: 'dose_number',
            name: 'dose_number',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.dose_given_date === null) {
                    return 'N/A';
                }

                return moment(row.dose_given_date).
                    utc().
                    format('Do MMM, Y h:mm A');
            },
            name: 'dose_given_date',
        },
    ],
});
