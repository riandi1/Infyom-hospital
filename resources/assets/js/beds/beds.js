'use strict';

let tbl = $('#bedsTbl').DataTable({
    processing: true,
    serverSide: true,

    'order': [[4, 'desc']],
    ajax: {
        url: bedUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [0],
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [3],
            'width': '10%',
            'className': 'text-right',
        },
        {
            'targets': [4],
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [5],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = bedUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.bed_id + '</a>';
            },
            name: 'bed_id',
        },
        {
            data: 'name',
            name: 'name',
        },
        {
            data: function (row) {
                let showLink = bedTypesUrl + '/' + row.bed_type.id;
                return '<a href="' + showLink + '">' + row.bed_type.title +
                    '</a>';
            },
            name: 'bedType.title',
        },
        {
            data: function (row) {
                return !isEmpty(row.charge) ? '<p class="cur-margin">' +
                    getCurrentCurrencyClass() + ' ' +
                    addCommas(row.charge) + '</p>' : 'N/A';
            },
            name: 'charge',
        },
        {
            data: function (row) {
                if(row.is_available){
                    return 'Yes';
                }
                return 'No';
            },
            name: 'is_available',
        },
        {
            data: function (row) {
                let data = [
                    {
                        'id': row.id,
                    }];
                return prepareTemplateRender('#bedActionTemplate', data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let bedId = $(event.currentTarget).data('id');
    deleteItem(bedUrl + '/' + bedId, '#bedsTbl', 'Bed');
});

// status activation deactivation change event
$(document).on('change', '.status', function (event) {
    let bedId = $(event.currentTarget).data('id');
    activeDeActiveStatus(bedId);
});

// activate de-activate Status
window.activeDeActiveStatus = function (id) {
    $.ajax({
        url: bedUrl + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
