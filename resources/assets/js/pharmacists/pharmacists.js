'use strict';
let tableName = '#pharmacistsTable';
let tbl = $('#pharmacistsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: pharmacistUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [0, 5],
            'orderable': false,
            'className': 'text-center',
            'width': '5%',
        },
        {
            'targets': [6],
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
                let showLink = pharmacistUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.user.full_name +
                    '</a>';
            },
            name: 'user.first_name',
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
                return isEmpty(row.user.blood_group)
                    ? 'N/A'
                    : row.user.blood_group;
            },
            name: 'user.blood_group',
        },
        {
            data: function (row) {
                let checked = row.user.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#pharmacistStatusTemplate', data);
            },
            name: 'user.status',
        },
        {
            data: function (row) {
                let url = pharmacistUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                    }];
                return prepareTemplateRender('#pharmacistActionTemplate', data);
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
    let pharmacistId = $(event.currentTarget).data('id');
    deleteItem(pharmacistUrl + '/' + pharmacistId, '#pharmacistsTable',
        'Pharmacist');
});

$(document).on('change', '.status', function (event) {
    let pharmacistId = $(event.currentTarget).data('id');
    updateStatus(pharmacistId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: pharmacistUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
