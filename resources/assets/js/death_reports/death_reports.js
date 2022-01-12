'use strict';

let tbl = $('#deathReportsTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[3, 'desc']],
    ajax: {
        url: deathReportUrl,
    },
    columnDefs: [
        {
            'targets': [4],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [5, 6],
            'visible': false,
        },
        {
            'targets': [1],
            'className': 'text-center',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
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
                let showLink = caseUrl + '/' + row.case_from_death_report.id;
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
                let url = deathReportUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                    }];
                return prepareTemplateRender('#deathReportActionTemplate',
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
    let deathReportId = $(event.currentTarget).data('id');
    deleteItem(deathReportUrl + '/' + deathReportId, '#deathReportsTbl', 'Death Report');
});
