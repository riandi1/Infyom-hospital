'use strict';

let tableName = '#opdPatientDepartmentsTable';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: opdPatientUrl,
    },
    columnDefs: [
        {
            'targets': [6],
            'className': 'text-center',
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
                let showLink = opdPatientUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.opd_number +
                    '</a>';
            },
            name: 'opd_number',
        },
        {
            data: 'doctor.user.full_name',
            name: 'doctor.user.first_name',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.appointment_date === null) {
                    return 'N/A';
                }

                return moment(row.appointment_date).format('Do MMM, Y h:mm A');
            },
            name: 'appointment_date',
        },
        {
            data: function (row) {
                return getCurrentCurrencyClass() +
                    addCommas(row.standard_charge);
            },
            name: 'standard_charge',
        },
        {
            data: 'payment_mode_name',
            name: 'payment_mode',
        },
        {
            data: 'patient.user.phone',
            name: 'patient.user.phone',
        },
        {
            data: 'visits',
            name: 'doctor.user.last_name',
        },
    ],
});
