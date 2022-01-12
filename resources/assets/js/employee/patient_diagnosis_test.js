'use strict';

let tableName = '#patientDiagnosisTestTable';
let tbl = $('#patientDiagnosisTestTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[4, 'asc']],
    ajax: {
        url: patientDiagnosisTestUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [0],
            'className': 'text-center',
            'width': '12%',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = patientDiagnosisTestUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.report_number +
                    '</a>';
            },
            name: 'report_number',
        },
        {
            data: 'category.name',
            name: 'category.name',
        },
        {
            data: function (row) {
                return row.patient.user.full_name;
            },
            name: 'patient.user.first_name',
        },
        {
            data: function (row) {
                return row.doctor.user.full_name;
            },
            name: 'doctor.user.first_name',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.created_at === null) {
                    return 'N/A';
                }
                return moment(row.created_at).format('Do MMM, Y');
            },
            name: 'created_at',
        },
    ],
});
