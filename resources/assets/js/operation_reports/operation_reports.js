'use strict';

let tbl = $('#operationReportsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[3, 'desc']],
    ajax: {
        url: operationReportUrl,
    },
    columnDefs: [
        {
            'targets': [4],
            'orderable': false,
            'className': 'text-center',
            'width': '12%',
        },
        {
            'targets': [1],
            'className': 'text-center',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [5, 6],
            'visible': false,
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
            data: function(row){
                let showLink = caseUrl + '/' + row.case_from_operation_report.id;
                return '<a href="' + showLink + '">'+ row.case_id +'</a>';
            },
            name: 'case_id',
        },
        {
            data: function (row) {
                let showLink = doctorUrl + '/' + row.doctor.id;
                return '<a href="' + showLink + '">' +
                    row.doctor.user.full_name + '</a>';
            },
            name: 'doctor.user.first_name',
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
                let url = operationReportUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                    }];
                return prepareTemplateRender('#operationReportActionTemplate',
                    data);
            }, name: 'id',
        },
        {
            data: 'patient.user.last_name',
            name: 'patient.user.last_name',
        },
        {
            data: 'doctor.user.last_name',
            name: 'doctor.user.last_name',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let operationReportId = $(event.currentTarget).data('id');
    deleteItem(operationReportUrl + '/' + operationReportId,
        '#operationReportsTable',
        'Operation Report');
});

