$(document).ready(function () {
    'use strict';

    let tableName = '#tblIpdPrescription';
    $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: ipdPrescriptionUrl,
            data: function (data) {
                data.id = ipdPatientDepartmentId;
            },
        },
        columnDefs: [
            {
                targets: '_all',
                defaultContent: 'N/A',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return '<a href="javascript:void(0)" class="viewIpdPrescription" data-pres-id="' +
                        row.id + '">' +
                        row.patient.ipd_number +
                        '</a>';
                },
                name: 'patient.ipd_number',
            },
            {
                data: function (row) {
                    return row;
                },
                render: function (row) {
                    if (row.created_at === null) {
                        return 'N/A';
                    }

                    return moment(row.created_at).format('Do MMM, Y');
                },
                name: 'created_at',
            },
        ],
    });

    $(document).on('click', '.viewIpdPrescription', function () {
        $.ajax({
            url: ipdPrescriptionUrl + '/' + $(this).data('pres-id'),
            type: 'get',
            success: function (result) {
                $('#ipdPrescriptionViewData').html(result);
                $('#showIpdPrescriptionModal').modal('show');
                ajaxCallCompleted();
            },
        });
    });

    $(document).on('click', '.printPrescription', function () {
        let divToPrint = document.getElementById('DivIdToPrint');
        let newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write(
            '<html><link href="' + bootstarpUrl +
            '" rel="stylesheet" type="text/css"/>' +
            '<body onload="window.print()">' + divToPrint.innerHTML +
            '</body></html>');
        newWin.document.close();
        setTimeout(function () {newWin.close();}, 10);
    });
});
