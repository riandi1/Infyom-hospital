'use strict';

let tableName = '#labTechniciansTable';
let tbl = $('#labTechniciansTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: labTechnicianUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [0, 5],
            'className': 'text-center',
            'width': '5%',
            'orderable': false,
        },
        {
            'targets': [6],
            'className': 'text-center',
            'width': '8%',
            'orderable': false,
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                return `<img src="${row.image_url}" class="user-img">`;
            },
            name: 'user.last_name',
        },
        {
            data: function (row) {
                let showLink = labTechnicianUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.user.full_name +
                    '</a>';
            },
            name: 'user.first_name',
        },
        {
            data: 'user.designation',
            name: 'user.designation',
        },
        {
            data: 'user.email',
            name: 'user.email',
        },
        {
            data: function (row) {
                return isEmpty(row.user.phone) ? 'N/A' : row.user.phone;
            },
            name: 'user.phone',
        },
        {
            data: function (row) {
                let checked = row.user.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#labTechnicianStatusTemplate',
                    data);
            },
            name: 'user.status',
        },
        {
            data: function (row) {
                let url = labTechnicianUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#labTechnicianActionTemplate',
                    data);
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
    let labTechnicianId = $(event.currentTarget).data('id');
    deleteItem(labTechnicianUrl + '/' + labTechnicianId, '#labTechniciansTable',
        'Lab Technician');
});

$(document).on('change', '.status', function (event) {
    let labTechnicianId = $(event.currentTarget).data('id');
    updateStatus(labTechnicianId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: labTechnicianUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
