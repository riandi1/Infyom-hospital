'use strict';

let tableName = '#prescriptionsTable';
let tbl = $('#prescriptionsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: prescriptionUrl,
        data: function (data) {
            data.status = $('#filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [7, 8],
            'orderable': false,
            'className': 'text-center',
        },
        {
            'targets': [8],
            'width': '8%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: 'patient.user.full_name',
            name: 'patient.user.first_name',
        },
        {
            data: 'doctor.user.full_name',
            name: 'doctor.user.first_name',
        },
        {
            data: function (row) {
                return isEmpty(row.medical_history)
                    ? 'N/A'
                    : row.medical_history;
            },
            name: 'medical_history',
        },
        {
            data: function (row) {
                return isEmpty(row.current_medication)
                    ? 'N/A'
                    : row.current_medication;
            },
            name: 'current_medication',
        },
        {
            data: function (row) {
                return isEmpty(row.health_insurance)
                    ? 'N/A'
                    : row.health_insurance;
            },
            name: 'health_insurance',
        },
        {
            data: function (row) {
                return isEmpty(row.low_income) ? 'N/A' : row.low_income;
            },
            name: 'low_income',
        },
        {
            data: function (row) {
                return isEmpty(row.reference) ? 'N/A' : row.reference;
            },
            name: 'reference',
        },
        {
            data: function (row) {
                let checked = row.status == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#prescriptionStatusTemplate',
                    data);
            },
            name: 'status',
        },
        {
            data: function (row) {
                let url = prescriptionUrl + '/' + row.id;
                let showUrl = prescriptionUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                        'showUrl': showUrl,
                    }];
                return prepareTemplateRender('#prescriptionActionTemplate',
                    data);
            }, name: 'patient.user.last_name',
        },
    ],
    'fnInitComplete': function () {
        $('#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).on('click', '.delete-btn', function (event) {
    let prescriptionId = $(event.currentTarget).data('id');
    deleteItem(prescriptionUrl + '/' + prescriptionId, '#prescriptionsTable',
        'Prescription');
});

$(document).on('change', '.status', function (event) {
    let prescriptionId = $(event.currentTarget).data('id');
    updateStatus(prescriptionId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: prescriptionUrl + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                tbl.ajax.reload(null, false);
            }
        },
    });
};
