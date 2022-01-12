'use strict';

let tableName = '#opdPatientDepartmentsTable';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: opdPatientUrl,
    },
    columnDefs: [
        {
            'targets': [4],
            'className': 'text-right',
        },
        {
            'targets': [7],
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [8],
            'orderable': false,
            'className': 'text-center',
            'width': '6%',
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
                let showLink = opdPatientUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.opd_number +
                    '</a>';
            },
            name: 'opd_number',
        },
        {
            data: function (row) {
                let showLink = doctorUrl + '/' + row.doctor.id;
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
                if (row.appointment_date === null) {
                    return 'N/A';
                }

                return moment(row.appointment_date).format('Do MMM, Y h:mm A');
            },
            name: 'appointment_date',
        },
        {
            data: function (row) {
                return getCurrentCurrencyClass() +
                    addCommas(row.standard_charge);
            },
            name: 'standard_charge',
        },
        {
            data: 'payment_mode_name',
            name: 'payment_mode',
        },
        {
            data: 'patient.user.phone',
            name: 'patient.user.phone',
        },
        {
            data: 'visits',
            name: 'id',
        },
        {
            data: function (row) {
                let data = [
                    {
                        'id': row.id,
                    }];
                return prepareTemplateRender('#opdPatientActionTemplate', data);
            }, name: 'patient.user.last_name',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let opdPatientId = $(event.currentTarget).data('id');
    deleteItem(opdPatientUrl + '/' + opdPatientId, tableName, 'OPD Patient');
});
