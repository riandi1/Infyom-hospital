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
                let showLink = patientDiagnosisTestUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.report_number +
                    '</a>';
            },
            name: 'report_number',
        },
        {
            data: function (row) {
                let showLink = diagnosisCategoryUrl + '/' + row.category.id;
                return '<a href="' + showLink + '">' + row.category.name +
                    '</a>';
            },
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
        {
            data: function (row) {
                let url = patientDiagnosisTestUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender(
                    '#patientDiagnosisTestActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let patientDiagnosisTestId = $(event.currentTarget).data('id');
    deleteItem(patientDiagnosisTestUrl + '/' + patientDiagnosisTestId,
        '#patientDiagnosisTestTable', 'Patient diagnosis test');
});
