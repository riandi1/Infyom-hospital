$(document).ready(function () {
    'use strict';

    $('.price-input').trigger('input');

    if (discount < 0) {
        $('.discount').val(0);
    }
    $('#discountId').blur(function () {
        if ($('#discountId').val().length == 0) {
            $('#discountId').val(0);
        }
    });

    $('#insuranceForm').find('input:text:visible:first').focus();

    window.isNumberKey = (evt, element) => {
        let charCode = (evt.which) ? evt.which : event.keyCode;

        return !((charCode !== 46 || $(element).val().indexOf('.') !== -1) &&
            (charCode < 48 || charCode > 57));
    };

    $(document).on('click', '#addItem', function () {
        let data = {
            'uniqueId': uniqueId,
        };
        let diseaseItemHtml = prepareTemplateRender(
            '#insuranceDiseaseTemplate', data);
        $('.disease-item-container').append(diseaseItemHtml);
        uniqueId++;

        resetInvoiceItemIndex();
    });

    $(document).on('click', '.delete-disease', function () {
        $(this).parents('tr').remove();
        resetInvoiceItemIndex();
        calculateAndSetInvoiceAmount();
    });

    function resetInvoiceItemIndex () {
        let index = 1;
        $('.disease-item-container>tr').each(function () {
            $(this).find('.item-number').text(index);
            index++;
        });
        if (index - 1 == 0) {
            $('#total').text('0');
            $('#billTbl tbody').append('<tr>' +
                '<td class="text-center item-number">1</td>' +
                '<td><input class="form-control disease-name" required name="disease_name[]" type="text"></td>' +
                '<td><input class="form-control disease-charge price-input" required name="disease_charge[]" type="text"></td>' +
                '<td class="text-center"><i class="fa fa-trash text-danger delete-disease pointer"></i></td>' +
                '</tr>');
        }
    }

    $(document).
        on('change', '.service-tax, .discount, .hospital-rate, .disease-charge',
            function () {
                calculateAndSetInvoiceAmount();
            });

    window.calculateAndSetInvoiceAmount = function () {
        let totalAmount = 0;
        let serviceTax = parseInt(
            $('.service-tax').val() !== '' ? removeCommas(
                $('.service-tax').val()) : 0);
        let hospitalRate = parseInt(
            $('.hospital-rate').val() !== '' ? removeCommas(
                $('.hospital-rate').val()) : 0);
        let discount = parseFloat($('.discount').val());
        totalAmount = serviceTax + hospitalRate;
        $('.disease-item-container>tr').each(function () {
            let itemTotal = parseInt(
                $(this).find('.disease-charge').val() != '' ? removeCommas(
                    $(this).find('.disease-charge').val()) : 0);
            totalAmount += itemTotal;
        });
        totalAmount -= (totalAmount * discount / 100);

        $('#total').text(addCommas(totalAmount.toFixed(2)));
        $('#total_amount').val(totalAmount);
    };

    $(document).on('submit', '#insuranceForm', function (event) {
        event.preventDefault();
        screenLock();
        $('#saveBtn').attr('disabled', true);
        let loadingButton = jQuery(this).find('#saveBtn');
        loadingButton.button('loading');
        let formData = new FormData($(this)[0]);
        $.ajax({
            url: insuranceSaveUrl,
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                displaySuccessMessage(result.message);
                window.location.href = insuranceUrl;
            },
            error: function (result) {
                printErrorMessage('#validationErrorsBox', result);
                $('#saveBtn').attr('disabled', false);
            },
            complete: function () {
                screenUnLock();
                loadingButton.button('reset');
            },
        });
    });
});
