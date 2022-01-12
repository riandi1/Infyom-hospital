'use strict';

let tbl = $('#employeeDoctorsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[1, 'asc']],
    ajax: {
        url: doctorUrl,
    },
    columnDefs: [
        {
            'targets': [0],
            'orderable': false,
            'className': 'text-center',
            'width': '5%',
        },
        {
            'targets': [1, 2, 3],
            'width': '30%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
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
                let showLink = doctorShowUrl + '/' + row.id;
                return '<a href="' + showLink + '">' + row.user.full_name +
                    '</a>';
            },
            name: 'user.first_name',
        },
        {
            data: 'specialist',
            name: 'specialist',
        },
        {
            data: function (row) {
                if (row.user.status == 1)
                    return 'Active';
                else
                    return 'Deactive';
            },
            name: 'user.status',
        },
    ],
});
