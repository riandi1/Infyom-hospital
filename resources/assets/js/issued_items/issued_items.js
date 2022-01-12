'use strict';

$('#filter_status').select2();

let tbl = $('#issuedItemsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[2, 'desc']],
    ajax: {
        url: issuedItemUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [5, 6],
            'orderable': false,
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [4],
            'className': 'text-right',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = issuedItemUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.item.name +
                    '</a>';
            },
            name: 'item.name',
        },
        {
            data: 'item.itemcategory.name',
            name: 'item.itemcategory.name',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                return moment(row.issued_date).utc().format('Do MMM, Y');
            },
            name: 'issued_date',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                if (row.return_date === null) {
                    return 'N/A';
                }

                return moment(row.return_date).utc().format('Do MMM, Y');
            },
            name: 'return_date',
        },
        {
            data: 'quantity',
            name: 'quantity',
        },
        {
            data: function (row) {
                let statusText = (row.status == 0) ? 'Return Item' : 'Returned';
                let statusBadge = (row.status == 0) ? 'info' : 'primary';
                let data = [
                    {
                        'id': row.id,
                        'status': row.status,
                        'statusText': statusText,
                        'statusBadge': statusBadge,
                    }];
                return prepareTemplateRender('#issuedItemStatusTemplate', data);
            },
            name: 'status',
        },
        {
            data: function (row) {
                let url = issuedItemUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#issuedItemActionTemplate', data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $('#issuedItemsTable').DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let issuedItemId = $(event.currentTarget).data('id');
    deleteItem(issuedItemUrl + '/' + issuedItemId, '#issuedItemsTable',
        'Issued Item');
});

$(document).on('click', '.changes-status-btn', function (event) {
    let issuedItemId = $(this).data('id');
    const issuedItemStatus = $(this).data('status');
    if (!issuedItemStatus) {
        swal({
                title: 'Return Item !',
                text: 'Are you sure want to return this item ?',
                type: 'warning',
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#5cb85c',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
            },
            function () {
                $.ajax({
                    url: returnIssuedItemUrl,
                    type: 'get',
                    dataType: 'json',
                    data: { id: issuedItemId },
                    success: function (data) {
                        swal({
                            title: 'Item Returned!',
                            text: data.message,
                            type: 'success',
                            timer: 2000,
                        });
                        tbl.ajax.reload(null, true);
                    },
                });
            });
    }
});
