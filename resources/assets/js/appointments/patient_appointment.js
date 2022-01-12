'use strict';

let tbl = $('#appointmentsTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[3, 'desc']],
    ajax: {
        url: appointmentUrl,
        data: function (data) {
            data.is_completed = $('#status').find('option:selected').val();
        },
    },
    columnDefs: [
        {
            'targets': [3],
            'width': '18%',
        },
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
            data: function (row) {
                if (patientRole) {
                    return row.doctor.user.full_name;
                }
                let showLink = doctorUrl + '/' + row.doctor.id;
                return '<a href="' + showLink + '">' +
                    row.doctor.user.full_name + '</a>';
            },
            name: 'doctor.user.first_name',
        },
        {
            data: function (row) {
                let showLink = doctorDepartmentUrl + '/' +
                    row.doctor.department.id;
                return '<a href="' + showLink + '">' +
                    row.doctor.department.title + '</a>';
            },
            name: 'doctor.department.title',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.opd_date === null) {
                    return 'N/A';
                }

                return moment(row.opd_date).utc().format('Do MMM, Y h:mm A');
            },
            name: 'opd_date',
        },
        {
            data: function (row) {
                let url = appointmentUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                        'isDoctor': doctorRole,
                    }];
                return prepareTemplateRender('#appointmentActionTemplate',
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
    'fnInitComplete': function () {
        $('#status').change(function () {
            $('#appointmentsTbl').DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let appointmentId = $(event.currentTarget).data('id');
    deleteItem(appointmentUrl + '/' + appointmentId, '#appointmentsTbl',
        'Appointment');
});

$('#status').select2();
