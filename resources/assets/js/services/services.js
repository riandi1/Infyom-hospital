'use strict';
let tableName = '#servicesReportTable';
let tbl = $('#servicesReportTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: serviceReportUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [4],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [1, 2],
            'className': 'text-right',
            'width': '8%',
        },
        {
            'targets': [3],
            'width': '8%',
            'className': 'text-center',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = serviceReportUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name + '</a>';
            },
            name: 'name',
        },
        {
            data: 'quantity',
            name: 'quantity',
        },
        {
            data: function (row) {
                return !isEmpty(row.rate) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.rate) + '</p>' : 'N/A';
            },
            name: 'rate',
        },
        {
            data: function (row) {
                let checked = row.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#servicesStatusTemplate', data);
            },
            name: 'status',
        },
        {
            data: function (row) {
                let url = serviceReportUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender(
                    '#servicesReportActionTemplate', data);
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
    let serviceId = $(event.currentTarget).data('id');
    deleteItem(
        serviceReportUrl + '/' + serviceId,
        '#servicesReportTable',
        'Service',
    );
});

$(document).on('change', '.status', function (event) {
    let serviceId = $(event.currentTarget).data('id');
    updateStatus(serviceId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: serviceReportUrl + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};

