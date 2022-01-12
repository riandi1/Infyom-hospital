'use strict';

let tableName = '#doctorsTable';
let tbl = $('#doctorsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: doctorUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [0, 6],
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
                let showLink = doctorUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.user.full_name +
                    '</a>';
            },
            name: 'user.first_name',
        },
        {
            data: 'specialist',
            name: 'specialist',
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
            data: 'user.qualification',
            name: 'user.qualification',
        },
        {
            data: function (row) {
                let checked = row.user.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#doctorStatusTemplate', data);
            },
            name: 'user.status',
        },
        {
            data: function (row) {
                let url = doctorUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#doctorActionTemplate', data);
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
    let doctorId = $(event.currentTarget).data('id');
    deleteItem(doctorUrl + '/' + doctorId, '#doctorsTable', 'Doctor');
});

$(document).on('change', '.status', function (event) {
    let doctorId = $(event.currentTarget).data('id');
    updateStatus(doctorId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: doctorUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
