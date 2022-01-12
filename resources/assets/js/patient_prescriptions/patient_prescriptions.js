'use strict';

let tableName = '#prescriptionsTable';
let tbl = $('#prescriptionsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: prescriptionUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [7],
            'orderable': false,
            'className': 'text-center',
            'width': '10%',

        },
        {
            'targets': [8],
            'orderable': false,
            'width': '5%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: 'patient.user.full_name',
            name: 'patient.user.first_name',
        },
        {
            data: 'doctor.user.full_name',
            name: 'doctor.user.first_name',
        },
        {
            data: function (row) {
                return isEmpty(row.medical_history)
                    ? 'N/A'
                    : row.medical_history;
            },
            name: 'medical_history',
        },
        {
            data: function (row) {
                return isEmpty(row.current_medication)
                    ? 'N/A'
                    : row.current_medication;
            },
            name: 'current_medication',
        },
        {
            data: function (row) {
                return isEmpty(row.health_insurance)
                    ? 'N/A'
                    : row.health_insurance;
            },
            name: 'health_insurance',
        },
        {
            data: function (row) {
                return isEmpty(row.low_income) ? 'N/A' : row.low_income;
            },
            name: 'low_income',
        },
        {
            data: function (row) {
                return isEmpty(row.reference) ? 'N/A' : row.reference;
            },
            name: 'reference',
        },
        {
            data: function (row) {
                if (row.status == 0)
                    return 'Deactive';
                else
                    return 'Active';
            },
            name: 'status',
        },
        {
            data: function (row) {
                let showLink = prescriptionUrl + '/' + row.id;
                return '<a href="' + showLink +
                    '" class="btn action-btn btn-primary btn-sm"><i class="fa fa-eye action-icon"></i></a>';
            }, name: 'patient.user.last_name',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});
