'use strict';

let tableName = '#visitorTbl';
let tbl = $('#visitorTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: visitorUrl,
        data: function (data) {
            data.purpose = $('#purposeArr').find('option:selected').val();
        },
    },
    columnDefs: [
        {
            'targets': [9],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [8],
            'orderable': false,
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                if (row.purpose == 1) {
                    return 'Visit';
                } else if (row.purpose == 2) {
                    return 'Enquiry';
                } else {
                    return 'Seminar';
                }
            },
            name: 'purpose',
        },
        {
            data: 'name',
            name: 'name',
        },
        {
            data: function (row) {
                return isEmpty(row.phone) ? 'N/A' : row.phone;
            },
            name: 'phone',
        },
        {
            data: function (row) {
                return isEmpty(row.id_card) ? 'N/A' : row.id_card;
            },
            name: 'id_card',
        },
        {
            data: function (row) {
                return isEmpty(row.no_of_person) ? 'N/A' : row.no_of_person;
            },
            name: 'no_of_person',
        },
        {
            data: function (row) {
                return isEmpty(row.date) ? 'N/A' : row.date;
            },
            name: 'date',
        },
        {
            data: function (row) {
                return isEmpty(row.in_time) ? 'N/A' : row.in_time;
            },
            name: 'in_time',
        },
        {
            data: function (row) {
                return isEmpty(row.out_time) ? 'N/A' : row.out_time;
            },
            name: 'out_time',
        },
        {
            data: function (row) {
                if (row.document_url != '') {
                    let downloadLink = downloadDocumentUrl + '/' + row.id;
                    return '<a href="' + downloadLink + '">' + 'Download' +
                        '</a>';
                }
                return 'N/A';
            },
            name: 'id',
        },
        {
            data: function (row) {
                let url = visitorUrl + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#visitorActionTemplate', data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#purposeArr').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let visitorId = $(event.currentTarget).data('id');
    deleteItem(visitorUrl + visitorId, tableName, 'Visitor');
});

$(document).ready(function () {
    $('#purposeArr').
        select2({
            width: '100%',
        });
});
