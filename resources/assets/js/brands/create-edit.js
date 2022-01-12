'use strict';

$(document).ready(function () {
    $('#createBrandForm, #editBrandForm').submit(function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    });

});
