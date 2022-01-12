'use strict';

let tableName = '#ipdPatientDepartmentsTable';
let tbl = $('#ipdPatientDepartmentsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[3, 'desc']],
    ajax: {
        url: ipdPatientUrl,
        data: function (data) {
            data.status = $('#filter_status').find('option:selected').val();
        },
    },
    columnDefs: [
        {
            'targets': [7],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = patientUrl + '/' + row.patient_id;
                return '<a href="' + showLink + '">' +
                    row.patient.user.full_name +
                    '</a>';
            },
            name: 'patient.user.first_name',
        },
        {
            data: function (row) {
                let showLink = ipdPatientUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.ipd_number +
                    '</a>';
            },
            name: 'ipd_number',
        },
        {
            data: function (row) {
                let showLink = doctorUrl + '/' + row.doctor_id;
                return '<a href="' + showLink + '">' +
                    row.doctor.user.first_name +
                    '</a>';
            },
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
            data: function (row) {
                let showLink = bedUrl + '/' + row.bed_id;
                return '<a href="' + showLink + '">' + row.bed.name +
                    '</a>';
            },
            name: 'bed.name',
        },
        {
            data: 'patient.user.phone',
            name: 'patient.user.phone',
        },
        {
            data: function (row) {
                if (row.bill_status == 1 && row.bill) {
                    if (row.bill.net_payable_amount <= 0) {
                        return 'Paid';
                    }
                }
                return 'Unpaid';
            },
            name: 'bill_status',
        },
        {
            data: function (row) {
                let url = ipdPatientUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'bill_status': row.bill_status,
                    }];
                return prepareTemplateRender('#ipdPatientActionTemplate', data);
            }, name: 'patient.user.last_name',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$('#filter_status').select2();

$(document).on('click', '.delete-btn', function (event) {
    let ipdPatientId = $(event.currentTarget).data('id');
    deleteItem(ipdPatientUrl + '/' + ipdPatientId,
        '#ipdPatientDepartmentsTable', 'IPD Patient');
});
