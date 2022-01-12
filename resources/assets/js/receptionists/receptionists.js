'use strict';
let tableName = '#receptionistsTbl';
let tbl = $('#receptionistsTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: receptionistUrl,
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
                let showLink = receptionistUrl + '/' + row.id;
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
                return prepareTemplateRender('#receptionistStatusTemplate',
                    data);
            },
            name: 'user.status',
        },
        {
            data: function (row) {
                let url = receptionistUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#receptionistActionTemplate',
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
    let receptionistId = $(event.currentTarget).data('id');
    deleteItem(receptionistUrl + '/' + receptionistId, '#receptionistsTbl',
        'Receptionist');
});

$(document).on('change', '.status', function (event) {
    let receptionistId = $(event.currentTarget).data('id');
    updateStatus(receptionistId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: receptionistUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
