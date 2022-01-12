'use strict';
let patientAdmissionsTable = '#patientAdmissionsTbl';
let tbl = $(patientAdmissionsTable).DataTable({
    processing: true,
    serverSide: true,
    'order': [[2, 'desc']],
    ajax: {
        url: patientAdmissionsUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [0],
            'width': '10%',
            'className': 'text-center',
        },
        {
            'targets': [8],
            'width': '5%',
            'orderable': false,
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
                let showLink = patientAdmissionsUrl + '/' + row.id;
                return '<a href="' + showLink + '">' +
                    row.patient_admission_id + '</a>';
            },
            name: 'patient_admission_id',
        },
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
                return row.doctor.user.full_name;
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

                return moment(row.admission_date).
                    format('Do MMM, Y h:mm A');
            },
            name: 'admission_date',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.discharge_date === null) {
                    return 'N/A';
                }

                return moment(row.discharge_date).
                    format('Do MMM, Y h:mm A');
            },
            name: 'discharge_date',
        },
        {
            data: function (row) {
                if (isEmpty(row.package_id)) {
                    return 'N/A';
                }
                let showLink = packageUrl + '/' + row.package.id;
                return '<a href="' + showLink + '">' + row.package.name +
                    '</a>';
            },
            name: 'package.name',
        },
        {
            data: function (row) {
                if (isEmpty(row.insurance_id)) {
                    return 'N/A';
                }
                let showLink = insuranceUrl + '/' + row.insurance.id;
                return '<a href="' + showLink + '">' + row.insurance.name +
                    '</a>';
            },
            name: 'insurance.name',
        },
        {
            data: function (row) {
                return isEmpty(row.policy_no) ? 'N/A' : row.policy_no;
            },
            name: 'policy_no',
        },
        {
            data: function (row) {
                return row.status == 0 ? 'Deactive' : 'Active';
            },
            name: 'status',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(patientAdmissionsTable).DataTable().ajax.reload(null, true);
        });
    },
});


