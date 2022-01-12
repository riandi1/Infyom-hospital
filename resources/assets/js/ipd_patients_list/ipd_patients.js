'use strict';

let tableName = '#ipdPatientDepartmentsTable';
let tbl = $('#ipdPatientDepartmentsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[2, 'desc']],
    ajax: {
        url: ipdPatientUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = ipdPatientUrl + '/' + row.id;
                return '<a href="' + showLink + '">' +
                    row.ipd_number +
                    '</a>';
            },
            name: 'ipd_number',
        },
        {
            data: 'doctor.user.first_name',
            name: 'doctor.user.first_name',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.admission_date === null) {
                    return 'N/A';
                }

                return moment(row.admission_date).format('Do MMM, Y h:mm A');
            },
            name: 'admission_date',
        },
        {
            data: 'bed.name',
            name: 'bed.name',
        },
        {
            data: 'patient.user.phone',
            name: 'patient.user.phone',
        },
    ],
});
