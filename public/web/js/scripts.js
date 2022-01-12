'use strict';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
});
$(document).ready(function () {
    // auto close menu after item click
    $('.navbar-nav>li>a').on('click', function () {
        $('.navbar-collapse').collapse('hide');
    });

    // scroll to top js
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#hms-top').fadeIn();
        } else {
            $('#hms-top').fadeOut();
        }
    });

    // scroll to top
    $(document).on('click', '#hms-top', function () {
        $('html, body').animate({ scrollTop: 0 }, 1000);
    });

    let maxWidth = $(window).width();
    let topOffset = 0;
    if (maxWidth <= 991) {
        topOffset = 200;
    }

    $(document).
        on('click', '#ancDepartments,#ancTestimonials,#ancHmsFeatures',
            function (e) {
                e.preventDefault();

                $('html, body').animate(
                    {
                        scrollTop: $($(this).attr('href')).offset().top -
                            topOffset,
                    },
                    500,
                    'linear',
                );
            });

    // Add smooth scrolling to all links
    $(document).on('change', '.linkItem', function (event) {
        if (this.hash !== '') {
            event.preventDefault();
            let hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top,
            }, 800, function () {
                window.location.hash = hash;
            });
        }
    });

    new WOW().init();

    $('.lightgallery').lightGallery({
        mode: 'lg-slide-circular',
        counter: false,
    });
});

$(document).
    on('submit', '#enquiryCreateForm', function () {
        $('#btnContact').attr('disabled', true);
    });

$(window).on('load', function () {
    $('.cookie-consent').addClass('p-3');
    $('.cookie-consent__agree').addClass('btn btn-sm');
});

// $(document).ready(function () {
// let patientType = "";
// let patient_type = (patientType == "") ? 'new patient' : patientType;
// updatePatientID(patient_type);
// $('input[type=radio][name=patient_type]').change(function () {
//     updatePatientID(this.value);
// });
//
// function updatePatientID(patient_type) {
//     if (patient_type == 'old patient') {
//         $('.new-patient').hide();
//         $('.old-patient').show();
//     } else if (patient_type == 'new patient') {
//         $('.old-patient').hide();
//         $('.new-patient').show();
//     }
// }

// $('.old-patient-email').focusout(function () {
//     let email = $('.old-patient-email').val();
//     $.ajax({
//         url: 'appointments' + '/' + email + '/patient-detail',
//         type: "get",
//         success: function (result) {
//             $('#patient').empty();
//             $.each(result.data, function(index, value){
//                 $("<option/>", {
//                     value: index,
//                     text: value,
//                 }).appendTo($('#patient'));
//             });
//         }
//     });
// });
// });

$(document).on('click', '.languageSelection', function () {
    let languageName = $(this).data('prefix-value');

    $.ajax({
        type: 'POST',
        url: '/change-language',
        data: { languageName: languageName },
        success: function () {
            location.reload();
        },
    });
});
$(document).ready(function () {
    $('#navbarSupportedContent .simple-menu .dropdown-toggle').
        hover(function () {
            $('#navbarSupportedContent .simple-menu .dropdown-menu').
                addClass('show');
        }, function () {
            $('#navbarSupportedContent .simple-menu .dropdown-menu').
                removeClass('show');
        });
});

/*
// Initialize and add the map
function initMap() {
    // The location from latLong
    let latLong = {lat: 21.235260, lng: 72.874690};
    // The map, centered
    let map = new google.maps.Map(
        document.getElementById('map'), {zoom: 4, center: latLong});
    // The marker, positioned
    let marker = new google.maps.Marker({position: latLong, map: map});
}
 */
