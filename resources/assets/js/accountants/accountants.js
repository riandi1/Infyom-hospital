'use strict';

let tableName = '#accountantsTbl';
let tbl = $('#accountantsTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: accountantUrl,
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
            'orderable': false,
            'width': '5%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [4],
            'className': 'text-center',
            'width': '5%',
            'orderable': false,
        },
        {
            'targets': [5],
            'className': 'text-center',
            'width': '8%',
            'orderable': false,
        },
    ],
    columns: [
        {
            data: function (row) {
                return `<img src="${row.image_url}" class="user-img">`;
            }, name: 'user.last_name',
        },
        {
            data: function (row) {
                let showLink = accountantUrl + '/' + row.id;
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
            data: 'user.phone',
            name: 'user.phone',
        },
        {
            data: function (row) {
                let checked = row.user.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#accountantStatusTemplate', data);
            },
            name: 'user.status',
        },
        {
            data: function (row) {
                let url = accountantUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#accountantActionTemplate', data);
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
    let accountantId = $(event.currentTarget).data('id');
    deleteItem(accountantUrl + '/' + accountantId, '#accountantsTbl',
        'Accountant');
});

$(document).on('change', '.status', function (event) {
    let accountantId = $(event.currentTarget).data('id');
    updateStatus(accountantId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: accountantUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
