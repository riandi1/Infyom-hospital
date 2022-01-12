'use strict';
let tableName = '#employeePayrollsTable';
let tbl = $('#employeePayrollsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc'], [2, 'asc']],
    ajax: {
        url: employeePayrollUrl,
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
            'targets': [1],
            'className': 'text-center',
            'width': '10%',
        },
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
        {
            'targets': [4],
            'className': 'text-right',
        },
        {
            'targets': [5],
            'className': 'text-right',
        },
    ],
    columns: [
        {
            data: 'sr_no',
            name: 'sr_no',
        },
        {
            data: function (row) {
                let showLink = employeePayrollUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.payroll_id + '</a>';
            },
            name: 'payroll_id',
        },
        {
            data: function (row) {
                return row.owner.user.full_name;
            },
            name: 'payroll_id',
        },
        {
            data: 'month',
            name: 'month',
        },
        {
            data: 'year',
            name: 'year',
        },
        {
            data: function (row) {
                return !isEmpty(row.net_salary) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.net_salary) + '</p>'
                    : 'N/A';
            },
            name: 'net_salary',
        },
        {
            data: function (row) {
                if (row.status == 1)
                    return 'Paid';
                else
                    return 'Unpaid';
            }, name: 'status',
        },
        {
            data: function (row) {
                let editLink = employeePayrollUrl + '/' + row.id + '/edit';
                return '<a title="Edit" class="btn action-btn btn-success btn-sm edit-btn mr-1" href="' +
                    editLink + '">'
                    +
                    '<i class="fa fa-edit  action-icon"></i>' +
                    '</a>' +
                    '<a title="Delete" class="btn action-btn btn-danger btn-sm delete-btn" data-id="' +
                    row.id + '">' +
                    '<i class="fa fa-trash action-icon text-danger"></i></a>';
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let employeePayrollId = $(event.currentTarget).data('id');
    deleteItem(
        employeePayrollUrl + '/' + employeePayrollId,
        '#employeePayrollsTable',
        'Employee Payroll'
    );
});

