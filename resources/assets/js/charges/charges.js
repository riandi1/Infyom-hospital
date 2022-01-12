'use strict';

let tbl = $('#chargesTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: chargeUrl,
        data: function (data) {
            data.charge_type = $('#chargeType').find('option:selected').val();
        },
    },
    columnDefs: [
        {
            'targets': [3],
            'className': 'text-right',
        },
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
    ],
    columns: [
        {
            data: function (row) {
                let showLink = chargeUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.code + '</a>';
            }, name: 'code',
        },
        {
            data: function (row) {
                let showLink = chargeCategoryUrl + '/' + row.charge_category.id;
                return '<a href="' + showLink + '">' +
                    row.charge_category.name + '</a>';
            },
            name: 'chargeCategory.name',
        },
        {
            data: function (row) {
                if (row.charge_type == 1) {
                    return 'Procedures';
                } else if (row.charge_type == 2) {
                    return 'Investigations';
                } else if (row.charge_type == 3) {
                    return 'Supplier';
                } else if (row.charge_type == 4) {
                    return 'Operation Theatre';
                } else {
                    return 'Others';
                }

            }, name: 'charge_type',
        },
        {
            data: function (row) {
                return !isEmpty(row.standard_charge) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.standard_charge) + '</p>' : 'N/A';
            },
            name: 'standard_charge',
        },
        {
            data: function (row) {
                let data = [
                    {
                        'id': row.id,
                    }];
                return prepareTemplateRender('#chargeActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#chargeType').change(function () {
            $('#chargesTbl').DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let chargeId = $(event.currentTarget).data('id');
    deleteItem(chargeUrl + '/' + chargeId,
        '#chargesTbl',
        'Charge');
});
