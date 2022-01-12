'use strict';

let tableName = '#visitedOPDPatientTable';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: visitedOPDPatients,
        data: {
            patient_id: patient_id,
            id: opdPatientDepartmentId,
        },
    },
    columnDefs: [
        {
            'targets': [0],
            'width': '8%',
        },
        {
            'targets': [7],
            'className': 'text-center',
            'width': '5%',
        },
        {
            'targets': [2],
            'className': 'text-right',
            'width': '12%',
        },
        {
            'targets': [1, 3],
            'width': '12%',
        },
        {
            'targets': [5, 6],
            render: function (data) {
                if (data != null) {
                    return data.length > 30 ?
                        data.substr(0, 30) + '...' :
                        data;
                }
            },
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
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
            data: function (row) {
                let showLink = doctorUrl + '/' + row.doctor_id;
                return '<a href="' + showLink + '">' +
                    row.doctor.user.first_name +
                    '</a>';
            },
            name: 'doctor.user.first_name',
        },
        {
            data: 'symptoms',
            name: 'symptoms',
        },
        {
            data: 'notes',
            name: 'notes',
        },
        {
            data: function (row) {
                let editLink = opdPatientUrl + '/' + row.id + '/edit';
                let data = [
                    {
                        'id': row.id,
                        'url': editLink,
                    }];

                return prepareTemplateRender('#opdVisitsActionTemplate', data);
            },
            name: 'doctor.user.last_name',
        },
    ],
});

$(document).on('click', '.delete-visit-btn', function (event) {
    let opdPatientId = $(event.currentTarget).data('id');
    deleteItem(opdPatientUrl + '/' + opdPatientId, tableName, 'OPD Patient');
});
