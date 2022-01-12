$(document).ready(function () {
    'use strict';

    let tableName = '#tblIpdConsultantRegisters';
    $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: ipdConsultantRegisterUrl,
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
                'targets': [4],
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
                    return row;
                },
                render: function (row) {
                    if (row.applied_date === null) {
                        return 'N/A';
                    }

                    return moment(row.applied_date).format('Do MMM, Y h:mm A');
                },
                name: 'applied_date',
            },
            {
                data: 'doctor.user.full_name',
                name: 'doctor.user.first_name',
            },
            {
                data: function (row) {
                    return row;
                },
                render: function (row) {
                    if (row.instruction_date === null) {
                        return 'N/A';
                    }

                    return moment(row.instruction_date).format('Do MMM, Y');
                },
                name: 'instruction_date',
            },
            {
                data: 'instruction',
                name: 'instruction',
            },
            {
                data: 'doctor.user.first_name',
                name: 'doctor.user.last_name',
                visible: false,
            },
        ],
    });
});
