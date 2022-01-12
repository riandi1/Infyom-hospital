'use strict';
let tableName = '#investigationReportTable';
let tbl = $('#investigationReportTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'desc']],
    ajax: {
        url: investigationReportUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [4, 5],
            'className': 'text-center',
        },
        {
            'targets': [5],
            'sortable': false,
        },
        {
            'targets': [6],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [7, 8],
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
                let showLink = investigationReportUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.title + '</a>';
            },
            name: 'title',
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
                if (row.status == 1)
                    return 'Solved';
                else
                    return 'Not Solved';
            },
            name: 'status',
        },
        {
            data: function (row) {
                if (row.attachment_url != null) {
                    let downloadLink = downloadDocumentUrl + '/' + row.id;
                    return '<a href="' + downloadLink + '">' + 'Download' +
                        '</a>';
                } else {
                    return 'N/A';
                }
            },
            name: 'id',
        },
        {
            data: function (row) {
                let url = investigationReportUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender(
                    '#investigationReportActionTemplate', data);
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
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let investigationReportId = $(event.currentTarget).data('id');
    deleteItem(
        investigationReportUrl + '/' + investigationReportId,
        '#investigationReportTable',
        'Investigation Report',
    );
});
