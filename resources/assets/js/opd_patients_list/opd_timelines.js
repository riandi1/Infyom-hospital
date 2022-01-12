$(document).ready(function () {
    'use strict';

    getOpdTimelines(opdPatientDepartmentId);
});

window.getOpdTimelines = function (opdPatientDepartmentId) {
    $.ajax({
        url: opdTimelinesUrl,
        type: 'get',
        data: { id: opdPatientDepartmentId },
        success: function (data) {
            $('#opdTimelines').html(data);
        },
    });
};
