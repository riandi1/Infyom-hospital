$(document).ready(function () {
    'use strict';

    screenLock();
    $.ajax({
        url: 'calendar-list',
        type: 'GET',
        dataType: 'json',
        success: function (obj) {
            screenUnLock();
            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',
                height: 750,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay',
                },
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day',
                },
                defaultDate: new Date(),
                defaultView: 'month',
                editable: false,
                eventAfterRender: function (event, element) {
                    $(element).tooltip({
                        title: event.title,
                        container: 'body',
                    });
                },
                events: obj.data,
                timeFormat: 'h:mm A',
                eventAfterAllRender: function (view) { /* used this vs viewRender */
                    setTimeout(function () {
                        $('#calendar button.fc-today-button').
                            removeClass('disabled').
                            prop('disabled', false);
                    }, 100);
                },
                eventClick: function (event) {
                    showAppointmentDetails(event.id);
                },
            });
        },
    });

    window.showAppointmentDetails = function (appointmentId) {
        $.ajax({
            url: 'appointment-detail' + '/' + appointmentId,
            type: 'GET',
            beforeSend: function () {
                screenLock();
            },
            success: function (data) {
                $('#patientName').text(data.data.patient);
                $('#departmentName').text(data.data.department);
                $('#doctorName').text(data.data.doctor);
                $('#opdDate').text(data.data.opdDate);
                $('#problem').text(addNewlines(data.data.problem, 30));
                $('.tooltip ').tooltip('hide');
                $('#appointmentDetailModal').modal('show');
            },
            complete: function () {
                screenUnLock();
            },
        });
    };

    window.addNewlines = function (str, chr) {
        let result = '';
        if (str != null) {
            while (str.length > 0) {
                result += str.substring(0, chr) + '\n';
                str = str.substring(chr);
            }

            return result;
        } else
            return 'N/A';
    };
});
