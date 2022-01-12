'use strict';

let tableName = '#caseHandlersTbl';
let tbl = $('#caseHandlersTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: caseHandlerUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
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
                let showLink = caseHandlerUrl + '/' + row.id;
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
                return prepareTemplateRender('#caseHandlerStatusTemplate',
                    data);
            },
            name: 'user.status',
        },
        {
            data: function (row) {
                let url = caseHandlerUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#caseHandlerActionTemplate',
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
    let caseHandlerId = $(event.currentTarget).data('id');
    deleteItem(caseHandlerUrl + '/' + caseHandlerId, '#caseHandlersTbl',
        'Case Handler');
});

$(document).on('change', '.status', function (event) {
    let caseHandlerId = $(event.currentTarget).data('id');
    updateStatus(caseHandlerId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: caseHandlerUrl + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
