'use strict';

let tableName = '#bedAssignsTbl';
let tbl = $('#bedAssignsTbl').DataTable({
    processing: true,
    serverSide: true,

    'order': [[3, 'desc']],
    ajax: {
        url: bedAssignUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [2],
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [5, 6],
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
                let showLink = patientUrl + '/' + row.patient.id;
                return '<a href="' + showLink + '">' +
                    row.patient.user.full_name + '</a>';
            },
            name: 'patient.user.first_name',
        },
        {
            data: function (row) {
                let showLink = bedUrl + '/' + row.bed.id;
                return '<a href="' + showLink + '">' + row.bed.name + '</a>';
            },
            name: 'bed.name',
        },
        {
            data: function(row){
                let showLink = caseUrl + '/' + row.case_from_bed_assign.id;
                return '<a href="' + showLink + '">'+ row.case_id +'</a>';
            },
            name: 'case_id',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.assign_date === null) {
                    return 'N/A';
                }

                return moment(row.assign_date).format('Do MMM, Y h:mm A');
            },
            name: 'assign_date',
        },
        {
            data: function (row) {
                if (row.discharge_date === null) {
                    return 'N/A';
                }

                return moment(row.discharge_date).format('Do MMM, Y h:mm A');
            },
            name: 'discharge_date',
        },
        {
            data: function (row) {
                let checked = row.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#bedAssignStatusTemplate', data);
            },
            name: 'status',
        },
        {
            data: function (row) {
                let url = bedAssignUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                    }];
                return prepareTemplateRender('#bedAssignActionTemplate', data);
            }, name: 'patient.user.last_name',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let bedAssignId = $(event.currentTarget).data('id');
    deleteItem(bedAssignUrl + '/' + bedAssignId, '#bedAssignsTbl', 'Bed Assign');
});

$(document).on('change', '.status', function (event) {
    let bedAssignId = $(event.currentTarget).data('id');
    updateStatus(bedAssignId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: bedAssignUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
