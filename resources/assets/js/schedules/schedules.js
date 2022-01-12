'use strict';
let tableName = '#schedulesTbl';
let tbl = $('#schedulesTbl').DataTable({
    processing: true,
    serverSide: true,

    'order': [[0, 'asc']],
    ajax: {
        url: scheduleUrl,
    },
    columnDefs: [
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
        {
            'targets': [2],
            'orderable': false,
            'className': 'text-center',
            'width': '11%',
        },
    ],
    columns: [
        {
            data: function (row) {
                let showLink = doctorUrl + '/' + row.doctor.id;
                return '<a href="' + showLink + '">' +
                    row.doctor.user.full_name + '</a>';
            },
            name: 'doctor.user.first_name',
        },
        {
            data: function (row) {
                return row;
            },
            render: function (row) {
                let time = moment(row.per_patient_time, 'HH:mm:ss').
                    format('HH:mm');
                if (time > moment('00:59:00', 'HH:mm:ss').format('HH:mm')) {
                    return time + ' hours';
                }
                return moment(row.per_patient_time, 'HH:mm:ss').format('m') +
                    ' minutes';
            },
            name: 'per_patient_time',
        },
        {
            data: function (row) {
                let url = scheduleUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'viewUrl': url,
                    }];
                return prepareTemplateRender('#scheduleActionTemplate', data);
            }, name: 'doctor.user.last_name',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let scheduleId = $(event.currentTarget).data('id');
    deleteItem(scheduleUrl + '/' + scheduleId, '#schedulesTbl', 'Schedule');
});
