$(document).ready(function () {
    'use strict';

    let tableName = '#tblIpdDiagnoses';
    $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[1, 'desc']],
        ajax: {
            url: ipdDiagnosisUrl,
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
                'targets': [3],
                'width': '20%',
            },
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
        ],
        columns: [
            {
                data: 'report_type',
                name: 'report_type',
            },
            {
                data: function (row) {
                    return row;
                },
                render: function (row) {
                    if (row.report_date === null) {
                        return 'N/A';
                    }

                    return moment(row.report_date).format('Do MMM, Y h:mm A');
                },
                name: 'report_date',
            },
            {
                data: function (row) {
                    if (row.ipd_diagnosis_document_url != '') {
                        let downloadLink = downloadDiagnosisDocumentUrl + '/' +
                            row.id;
                        return '<a href="' + downloadLink + '">' + 'Download' +
                            '</a>';
                    } else
                        return 'N/A';
                },
                name: 'description',
            },
            {
                data: 'description',
                name: 'description',
            },
        ],
    });
});
