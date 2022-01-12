'use strict';

let tbl = $('#chargeCategoriesTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: chargeCategoryUrl,
    },
    columnDefs: [
        {
            'targets': [3],
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
                let showLink = chargeCategoryUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.name + '</a>';
            },
            name: 'name',
        },
        {
            data: function (row) {
                return isEmpty(row.description) ? 'N/A' : row.description;
            },
            name: 'description',
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
                let data = [
                    {
                        'id': row.id,
                    }];
                return prepareTemplateRender('#chargeCategoryActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let chargeCategoryId = $(event.currentTarget).data('id');
    deleteItem(chargeCategoryUrl + '/' + chargeCategoryId,
        '#chargeCategoriesTbl',
        'Charge Category');
});
