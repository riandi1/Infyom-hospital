'use strict';
let tableName = '#casesTbl';
let tbl = $('#casesTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'desc']],
    ajax: {
        url: casesUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
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
            'targets': [7],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [8, 9],
            'visible': false,
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = casesUrl + '/' + row.id;
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
                let checked = row.status == 0 ? '' : 'checked';
                return ' <label class="switch switch-label switch-outline-primary-alt switch-center">' +
                    '<input name="status" data-id="' + row.id +
                    '" class="switch-input status" type="checkbox" value="1" ' +
                    checked + '>' +
                    '<span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>' +
                    '</label>';
            },
            name: 'status',
        },
        {
            data: function (row) {
                let url = casesUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#caseActionTemplate', data);
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
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let caseId = $(event.currentTarget).data('id');
    deleteItem(casesUrl + '/' + caseId, '#casesTbl', 'Case');
});

// status activation deactivation change event
$(document).on('change', '.status', function (event) {
    let caseId = $(event.currentTarget).data('id');
    activeDeActiveStatus(caseId);
});

// activate de-activate Status
window.activeDeActiveStatus = function (id) {
    $.ajax({
        url: casesUrl + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload();
            }
        },
    });
};
