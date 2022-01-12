'use strict';
let patientAdmissionsTable = '#patientAdmissionsTbl';
let tbl = $(patientAdmissionsTable).DataTable({
    processing: true,
    serverSide: true,
    'order': [[3, 'desc']],
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
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [9],
            'width': '8%',
            'orderable': false,
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
                if (userRole) {
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
                let checked = row.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#patientAdmissionStatusTemplate',
                    data);
            },
            name: 'status',
        },
        {
            data: function (row) {
                let url = patientAdmissionsUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                    }];
                return prepareTemplateRender('#patientAdmissionActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(patientAdmissionsTable).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let id = $(event.currentTarget).data('id');
    deleteItem(patientAdmissionsUrl + '/' + id, patientAdmissionsTable,
        'Patient Admission');
});

$(document).on('change', '.status', function (event) {
    let id = $(event.currentTarget).data('id');
    updateStatus(id);
});

window.updateStatus = function (id) {
    $.ajax({
        url: patientAdmissionsUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
