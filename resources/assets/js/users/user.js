$(document).ready(function () {
    'use strict';

    let tableName = '#usersTable';
    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[1, 'desc']],
        ajax: {
            url: userUrl,
            data: function (data) {
                data.department_id = $('#roleArr').
                    find('option:selected').
                    val();
                data.status = $('#statusArr').find('option:selected').val();
            },
        },
        columnDefs: [
            {
                'targets': [0, 4],
                'className': 'text-center',
                'orderable': false,
                'width': '5%',
            },
            {
                'targets': [5],
                'className': 'text-center',
                'orderable': false,
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
                    return `<img src="${row.image_url}" class="user-img image-stretching">`;
                },
                name: 'id',
            },
            {
                data: function (row) {
                    let showLink = userShowUrl + '/' + row.id;
                    return '<a href="' + showLink + '">' + row.full_name +
                        '</a>';
                },
                name: 'first_name',
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: 'department.name',
                name: 'department.name',
            },
            {
                data: function (row) {
                    let checked = row.status == 0 ? '' : 'checked';
                    let data = [{ 'id': row.id, 'checked': checked }];
                    return prepareTemplateRender('#userStatusTemplate', data);
                },
                name: 'status',
            },
            {
                data: function (row) {
                    let url = userUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#usersTemplate', data);
                },
                name: 'last_name',
            },
        ],
        'fnInitComplete': function () {
            $('#roleArr, #statusArr').change(function () {
                $('#usersTable').DataTable().ajax.reload(null, true);
            });
        },
    });

    $('#roleArr, #statusArr').select2({ width: '100%' });
});

$(document).on('click', '.delete-btn', function (event) {
    let userId = $(event.currentTarget).data('id');
    deleteItem(userUrl + '/' + userId, '#usersTable', 'User');
});

$(document).on('change', '.status', function (event) {
    let userId = $(event.currentTarget).data('id');
    updateStatus(userId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: userUrl + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#usersTable').DataTable().ajax.reload(null, false);
            }
        },
    });
};
