'use strict';

let jsrender = require('jsrender');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
});
$(document).on('keydown', function (e) {
    if (e.keyCode === 27) {
        $('.modal').modal('hide');
    }
});
$('input:text:not([readonly="readonly"])').first().focus();

$(document).
    on('focus', '.select2-selection.select2-selection--single', function (e) {
        $(this).
            closest('.select2-container').
            siblings('select:enabled').
            select2('open');
    });

$(document).ready(function () {
    // initializer script for bootstrap 4 tooltip
    $('[data-toggle="tooltip"]').tooltip({ delay: { show: 500, hide: 50 } });

    // script to active parent menu if sub menu has currently active
    let hasActiveMenu = $(document).
        find('.nav-item.nav-dropdown ul li.nav-item').
        hasClass('active');
    if (hasActiveMenu)
        $(document).
            find('.nav-item.nav-dropdown ul li.nav-item.active').
            parent('ul').
            parent('li').
            addClass('open');

    $('.nav-item.nav-dropdown').on('click', function () {
        let openLiSelector = $(document).
            find('.nav-item.nav-dropdown').
            hasClass('open');
        if (openLiSelector && $(this).hasClass('open'))
            setTimeout(function () { $(this).removeClass('open'); }, 1000);
        else
            $(document).find('.nav-item.nav-dropdown').removeClass('open');
    });

    // remove capital letters from email validation script.
    $('input[name="email"]').keyup(function () {
        this.value = this.value.toLowerCase();
    });
    $('input[name="email"]').keypress(function (e) {
        if (e.which === 32)
            return false;
    });
});

$(function () {
    $('.modal').on('shown.bs.modal', function () {
        $(this).find('input:text').first().focus();
    });
});

window.resetModalForm = function (formId, validationBox) {
    $(formId)[0].reset();
    $('select.select2Selector').each(function (index, element) {
        let drpSelector = '#' + $(this).attr('id');
        $(drpSelector).val('');
        $(drpSelector).trigger('change');
    });
    $(validationBox).hide();
};

window.printErrorMessage = function (selector, errorResult) {
    $(selector).show().html("");
    $(selector).text(errorResult.responseJSON.message);
};

window.manageAjaxErrors = function (data) {
    var errorDivId = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'editValidationErrorsBox';

    if (data.status == 404) {
        $.toast({
            heading: 'Error',
            text: data.responseJSON.message,
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
    } else {
        printErrorMessage("#" + errorDivId, data);
    }
};

window.displaySuccessMessage = function (message) {
    $.toast({
        heading: 'Success',
        text: message,
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-right',
    });
};

window.displayErrorMessage = function (message) {
    $.toast({
        heading: 'Error',
        text: message,
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right',
    });
};

window.displayPhoto = function (input, selector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                $(selector).attr('src', e.target.result);
                displayPreview = true;
            };
        };
        if (displayPreview) {
            reader.readAsDataURL(input.files[0]);
            $(selector).show();
        }
    }
};

window.isValidFile = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).
            html('The image must be a file of type: jpeg, jpg, png.').
            removeClass('display-none').
            show();
        setTimeout(function () {
            $(validationMessageSelector).slideUp(300);
        }, 5000);

        return false;
    }
    $(validationMessageSelector).addClass('display-none');

    return true;
};

window.format = function (dateTime) {
    var format = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'DD-MMM-YYYY';
    return moment(dateTime).format(format);
};

window.DatetimepickerDefaults = function(opts) {
    return $.extend({},{
        sideBySide: true,
        ignoreReadonly: true,
        icons: {
            up: "icon-arrow-up-circle icons font-2xl",
            down: "icon-arrow-down-circle icons font-2xl",
            previous: 'icon-arrow-left icons',
            next: 'icon-arrow-right icons',
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            today: 'fa fa-crosshairs',
            clear: 'fa fa-trash',
            close: 'fa fa-times'
        }
    }, opts);
};

window.screenLock = function() {
    $('#overlay-screen-lock').show();
    $('body').css({'pointer-events':'none','opacity':'0.6'});
};

window.screenUnLock = function() {
    $('body').css({'pointer-events':'auto','opacity':'1'});
    $("#overlay-screen-lock").hide();
};

window.prepareTemplateRender = function (templateSelector, data) {
    let template = jsrender.templates(templateSelector);
    return template.render(data);
};

/**
 * @return string
 */
window.getCurrentCurrencyClass = function () {
    return '<b>' + currentCurrency + '</b>';
};

window.displayDocument = function (input, selector, extension) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            if ($.inArray(extension, ['pdf', 'doc', 'docx']) == -1) {
                image.src = e.target.result;
            } else {
                if (extension == 'pdf') {
                    image.src = pdfDocumentImageUrl;
                } else {
                    image.src = docxDocumentImageUrl;
                }
            }
            image.onload = function () {
                $(selector).attr('src', image.src);
                displayPreview = true;
            };
        };
        if (displayPreview) {
            reader.readAsDataURL(input.files[0]);
            $(selector).show();
        }
    }
};

window.ajaxCallInProgress = function () {
    ajaxCallIsRunning = true;
};

window.ajaxCallCompleted = function () {
    ajaxCallIsRunning = false;
};

window.UnprocessableInputError = function (data) {
    $.toast({
        heading: 'Error',
        text: data.responseJSON.message,
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right',
    });
};

$(document).on('click', '.notification', function (e) {
    e.stopPropagation();
    let notificationId = $(this).data('id');
    let notification = $(this);
    $('[data-toggle="tooltip"]').tooltip('hide');

    $.ajax({
        type: 'get',
        url: '/notification/' + notificationId + '/read',
        success: function () {
            notification.remove();
            let notificationCounter = document.getElementsByClassName(
                'notification').length;
            $('#counter').text(notificationCounter);
            if (notificationCounter == 0) {
                $('.read-all-notification').addClass('d-none');
                $('.empty-state').removeClass('d-none');
                $('#counter').text(notificationCounter);
                $('.notification-count').addClass('d-none');
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
});

$(document).on('click', '#readAllNotification', function (e) {
    e.stopPropagation();

    $.ajax({
        type: 'post',
        url: '/read-all-notification',
        success: function () {
            $('.notification').remove();
            let notificationCounter = document.getElementsByClassName(
                'notification').length;
            $('#counter').text(notificationCounter);
            $('#readAllNotification').addClass('d-none');
            $('.empty-state').removeClass('d-none');
            $('.notification-count').addClass('d-none');
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
});
