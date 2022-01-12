'use strict';
let tableName = '#nursesTbl';
let tbl = $('#nursesTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: nurseUrl,
        data: function (data) {
            data.status = $('#filter_status').find('option:selected').val();
        },
    },
    columnDefs: [
        {
            'targets': [0],
            'orderable': false,
            'className': 'text-center',
            'width': '5%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [6],
            'orderable': false,
            'className': 'text-center',
            'width': '5%',
        },
        {
            'targets': [7],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
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
                let showLink = nurseUrl + '/' + row.id;
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
            data: 'user.qualification',
            name: 'user.qualification',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.user.dob === null) {
                    return 'N/A';
                }

                return moment(row.user.dob).format('Do MMM, Y');
            },
            name: 'user.dob',
        },
        {
            data: function (row) {
                let checked = row.user.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#nurseStatusTemplate', data);
            },
            name: 'user.status',
        },
        {
            data: function (row) {
                let url = nurseUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#nurseActionTemplate', data);
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
    let nurseId = $(event.currentTarget).data('id');
    deleteItem(nurseUrl + '/' + nurseId, '#nursesTbl', 'Nurse');
});

$(document).on('change', '.status', function (event) {
    let nurseId = $(event.currentTarget).data('id');
    updateStatus(nurseId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: nurseUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
