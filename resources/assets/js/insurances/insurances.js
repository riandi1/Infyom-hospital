'use strict';

let tableName = '#insurancesTbl';
let tbl = $('#insurancesTbl').DataTable({
    processing: true,
    serverSide: true,

    'order': [[0, 'asc']],
    ajax: {
        url: insuranceUrl,
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
            'targets': [1, 4, 5],
            'className': 'text-right',
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
                let showLink = insuranceUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name + '</a>';
            },
            name: 'name',
        },
        {
            data: function (row) {
                return !isEmpty(row.service_tax) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.service_tax) + '</p>' : 'N/A';
            },
            name: 'service_tax',
        },
        {
            data: 'insurance_no',
            name: 'insurance_no',
        },
        {
            data: 'insurance_code',
            name: 'insurance_code',
        },
        {
            data: function (row) {
                return !isEmpty(row.hospital_rate) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.hospital_rate) + '</p>' : 'N/A';
            },
            name: 'hospital_rate',
        },
        {
            data: function (row) {
                return !isEmpty(row.total) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.total) + '</p>' : 'N/A';
            },
            name: 'total',
        },
        {
            data: function (row) {
                let checked = row.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#insuranceStatusTemplate', data);
            },
            name: 'status',
        },
        {
            data: function (row) {
                let url = insuranceUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#insuranceActionTemplate', data);
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
    let insuranceId = $(event.currentTarget).data('id');
    deleteItem(insuranceUrl + '/' + insuranceId, '#insurancesTbl', 'Insurance');
});

$(document).on('change', '.status', function (event) {
    let insuranceId = $(event.currentTarget).data('id');
    updateStatus(insuranceId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: insuranceUrl + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
