'use strict';
let tbl = $('#patientCasesTbl').DataTable({
    processing: true,
    serverSide: true,

    'order': [[1, 'desc']],
    ajax: {
        url: patientCasesUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [0],
            'className': 'text-center',
            'width': '10%',

        },
        {
            'targets': [5],
            'className': 'text-right',
        },
        {
            'targets': [1],
            'width': '15%',
        },
        {
            'targets': [6],
            'orderable': false,
            'className': 'text-center',
            'width': '6%',
        },
        {
            'targets': [7, 8],
            'visible': false,
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = patientCaseShowUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.case_id + '</a>';
            },
            name: 'case_id',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.date === null) {
                    return '';
                }
                return moment(row.date).format('Do MMM, Y h:mm A');
            },
            name: 'date',
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
            data: 'phone',
            name: 'phone',
        },
        {
            data: function (row) {
                return !isEmpty(row.fee) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.fee) + '</p>' : 'N/A';
            },
            name: 'fee',
        },
        {
            data: function (row) {
                if (row.status == 1)
                    return 'Active';
                else
                    return 'Deactive';
            },
            name: 'status',
        },
        {
            data: function (row) {
                let showLink = patientCaseShowUrl + '/' + row.id;
                return '<a title="Show" class="btn action-btn btn-primary btn-sm mr-1" href="' +
                    showLink + '">' +
                    '<i class="fa fa-eye action-icon p-case-list-color"></i>' +
                    '</a>';
            }, name: 'id',
        },
        {
            data: 'patient.user.first_name',
            name: 'patient.user.first_name',
            visible: false,
        },
        {
            data: 'doctor.user.last_name',
            name: 'doctor.user.last_name',
            visible: false,
        },
    ],
});
