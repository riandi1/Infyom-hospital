@extends('web.layouts.front')
@section('title')
    {{ __('web.home') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lightgallery/dist/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lightgallery/dist/css/lg-transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}"/>
@endsection
@section('content')
    {{-- header container starts --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="landing-header">
                    <div class="row">
                        <div class="col-lg-6 order-lg-2 col-12">
                            <div class="header_image">
                                <img src="{{ asset('web/img/header-img.jpg') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 header-text order-lg-1 col-12">
                            <p class="welcome-text mb-5 wow fadeInUp"
                               data-wow-duration="0.4s">{{ __('web.welcome_to') }} <br> <span
                                        class="heading-name">{{ __('web.infyhms') }}</span> <span
                                        class="heading-text">{{ __('web.manage_your_hospital_day_to_day_operations_digitally_with_ease_and_effortlessly') }}</span>
                            </p>
                            <a href="https://codecanyon.net/item/infyhms-smart-hospital-management-system/26344507"
                               class="header-contact-button wow bounceIn" data-wow-delay="0.4s"
                               target="_blank">{{ __('web.buy_now') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- header container ends --}}

    <div class="container features">
        <h4 class="m-0 p-0 text-center section-heading">{{ __('web.features.features') }}</h4>
        <div class="row">
            <div class="col-lg-3 col-md-6 my-5 text-center features-block wow fadeInUp" data-wow-delay=".2s">
                <i class="fas fa-ambulance d-flex justify-content-center mx-auto hover-transitions ambulance"></i>
                <h5 class="pt-3 text-uppercase font-weight-bold">{{ __('web.features.emergency_services') }}</h5>
                <p class="text-muted">{{ __('web.features.we_are_providing_advanced_emergency_services_We_have_well-equipped_emergency_and_trauma_center_with_facilities') }}</p>
            </div>
            <div class="col-lg-3 col-md-6 my-5 text-center features-block wow fadeInUp" data-wow-delay=".3s">
                <i class="fas fa-user-md d-flex justify-content-center mx-auto hover-transitions qualified-doctor"></i>
                <h5 class="pt-3 text-uppercase font-weight-bold">{{ __('web.features.qualified_doctors') }}</h5>
                <p class="text-muted">{{ __('web.features.our_team_of_pathologists_microbiologists_and_clinical_laboratory_scientists_are_always_ready_to_help_you_with_your_laboratory_needs') }}</p>
            </div>
            <div class="col-lg-3 col-md-6 my-5 text-center features-block wow fadeInUp" data-wow-delay=".4s">
                <i class="fas fa-stethoscope d-flex justify-content-center mx-auto hover-transitions  outdoor-checkup"></i>
                <h5 class="pt-3 text-uppercase font-weight-bold">{{ __('web.features.outdoors_checkup') }}</h5>
                <p class="text-muted">{{ __('web.features.our_doctors_are_always_ready_for_outdoor_checkup_in_an_emergency_we_have_different_types_of_charges_as_per_checkup') }}</p>
            </div>
            <div class="col-lg-3 col-md-6  my-5 text-center features-block wow fadeInUp" data-wow-delay=".5s">
                <i class="fas fa-history d-flex justify-content-center mx-auto hover-transitions service-clock"></i>
                <h5 class="pt-3 text-uppercase font-weight-bold">{{ __('web.features.hours_services') }}</h5>
                <p class="text-muted">{{ __('web.features.our_clinic_provides_extensive_medical_support_and_healthcare_services_24/7') }}</p>
            </div>
        </div>
    </div>

    {{-- Departments container starts --}}
    <div class="container pt-5" id="departments">
        <h4 class="m-0 p-0 text-center section-heading">{{ __('web.departments') }}</h4>
        <div class="row mt-3 content-icons">
            <div class="col-12">
                <div class="row">
                    @foreach($doctorsDepartments as $doctorsDepartment)
                        <div class="col-lg-4 col-6 my-5 text-center contents-box hover-transitions wow fadeInUp department-item">
                            <i class="fas fa-stethoscope d-flex justify-content-center mx-auto hover-transitions"></i>
                            <h5 class="pt-3 text-muted">{{ $doctorsDepartment->title }}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Departments container ends --}}

    <div class="container-fluid" id="hmsFeatures">
        <div class="container mt-5">
            <h4 class="m-0 p-0 text-center section-heading">{{ __('web.backend_features') }}</h4>
            <div class="row">
                <div class="col-12 mt-3 hms__features">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/administrative-feature.png') }}">
                                    <img src="{{ asset('web/img/administrative-feature.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.dashboard') }}</h4>
                                {{--                                <p class="hms__feature-text text-muted"></p>--}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/02. Change Password.png') }}">
                                    <img src="{{ asset('web/img/02. Change Password.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.change_password') }}</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/change_language.jpg') }}">
                                    <img src="{{ asset('web/img/change_language.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.change_language') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/invoice_listing.jpg') }}">
                                    <img src="{{ asset('web/img/invoice_listing.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.invoice_listing') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/create_invoice.jpg') }}">
                                    <img src="{{ asset('web/img/create_invoice.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.create_invoice') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/13. New BIll.png') }}">
                                    <img src="{{ asset('web/img/13. New BIll.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.create_bill') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/appointments_calander_view.jpg') }}">
                                    <img src="{{ asset('web/img/appointments_calander_view.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.appointments') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/06. Beds List.png') }}">
                                    <img src="{{ asset('web/img/06. Beds List.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.bed_listing') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/06.1. Bed Details.png') }}">
                                    <img src="{{ asset('web/img/06.1. Bed Details.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.bed_details') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/06.2. Bed Assign.png') }}">
                                    <img src="{{ asset('web/img/06.2. Bed Assign.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.bed_allotment') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/document_listing.jpg') }}">
                                    <img src="{{ asset('web/img/document_listing.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.document') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/14. New Ambulance.png') }}">
                                    <img src="{{ asset('web/img/14. New Ambulance.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.add_ambulance') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/create_insurance.jpg') }}">
                                    <img src="{{ asset('web/img/create_insurance.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.create_insurance') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/create_doctor.jpg') }}">
                                    <img src="{{ asset('web/img/create_doctor.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.create_doctor') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/15. Add Medicine.png') }}">
                                    <img src="{{ asset('web/img/15. Add Medicine.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.create_medicine') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/16. Employee Payroll Details.png') }}">
                                    <img src="{{ asset('web/img/16. Employee Payroll Details.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.add_employee_payroll_details') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/employee-payroll.jpg') }}">
                                    <img src="{{ asset('web/img/employee-payroll.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.employee_payroll_details') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/payment-reports.jpg') }}">
                                    <img src="{{ asset('web/img/payment-reports.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.payment_reports') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/enquiries.jpg') }}">
                                    <img src="{{ asset('web/img/enquiries.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.enquiry_listing') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/17. Pateint Admission.png') }}">
                                    <img src="{{ asset('web/img/17. Pateint Admission.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.patient_admission_listing') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/04. Doctors Schedule.png') }}">
                                    <img src="{{ asset('web/img/04. Doctors Schedule.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.doctor_schedules') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/birth_report_listing.jpg') }}">
                                    <img src="{{ asset('web/img/birth_report_listing.jpg') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.birth_report_listing') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/18. Email Service.png') }}">
                                    <img src="{{ asset('web/img/18. Email Service.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.email_service') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 hms__features__block wow fadeInUp">
                            <div class="hms__features-img lightgallery">
                                <a href="{{ asset('web/img/11. Settings.png') }}">
                                    <img src="{{ asset('web/img/11. Settings.png') }}">
                                </a>
                            </div>
                            <div class="hms__features-content text-center">
                                <h4 class="mt-3">{{ __('web.backend_feature.settings') }}</h4>
                                <p class="hms__feature-text text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" id="hmsFacilities">
        <h4 class="m-0 p-0 text-center section-heading">{{ __('web.miscellaneous_facilities.miscellaneous_facilities_of_infyhms') }}</h4>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="facility-block-one">
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.host_in_your_Own_secure_server') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.no_monthly_or_yearly_fees') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.customer_support') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.multi_language_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.admin_and_customer_has_separate_ui_and_login') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.email_and_sms_gateway_adding_for_marketing') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.complete_hospital_management_solution') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.prescription_management_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.doctor_management_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.insurance_management_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.billing_management_system') }}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="facility-block-two">
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.role_based_permission_setup_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.multiple_email_and_sms_gateway_added') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.human_resource_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.complete_Bed_management_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.medication_and_visits_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.case_manager_management_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.patient_separate_login_and_appointment_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.hospital_enquiry_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.parmacy_management_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.appointment_management_system') }}</li>
                            <li class="facility-item">{{ __('web.miscellaneous_facilities.investigation_reports') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- start using hms block --}}

    <div class="container-fluid start-using-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 justify-content-center d-flex flex-column start-using-content">
                    <p class="start-using-heading wow fadeInUp"
                       data-wow-delay=".2s">{{ __('web.start_using_InfyHMS_now') }}
                    </p>
                    <a class="get-started-btn wow bounceInUp" data-wow-delay=".3s"
                       href="{{url('login')}}">{{ __('web.get_started') }}</a>
                </div>
                <div class="col-lg-7 start-using-image">
                    <img src="{{ asset('web/img/dashboard.png') }}" class="w-100 wow fadeInUp" data-wow-delay=".4s">
                </div>
            </div>
        </div>
    </div>
    {{-- end start using hms block --}}

    @if(count($testimonials) > 0)
        <div class="container testimonials" id="testimonials">
            <h4 class="text-center section-heading">{{ __('messages.testimonials') }}</h4>
            <div class="testimonial-wrapper mt-3">
                <div class="col-lg-12 col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($testimonials as $testimonial)
                            <div class="item">
                                <div class="testimonial-item d-flex align-items-center flex-column">
                                    <img src="{{ $testimonial->document_url }}" class="testimonial-image"
                                         alt="Testimonial Image">
                                    <div class="testimonial-content">
                                        <h3 class="testimonial-name">{{$testimonial->name}}</h3>
                                        @if((Str::length($testimonial->description) < 90))
                                            <span>{{$testimonial->description}}</span>
                                        @else
                                            <span data-toggle="tooltip" data-placement="bottom"
                                                  title="{{$testimonial->description}}"
                                                  data-delay="{'show':500,'hide':100}">
                                            {{ Str::limit($testimonial->description,200,'...') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- end testimonial block --}}
@endsection
@section('page_scripts')
    <script>
        $(window).on('load', function () {
            $('.owl-carousel').owlCarousel({
                margin: 10,
                autoplay: true,
                loop: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsiveClass: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    320: {
                        items: 1,
                        margin: 20,
                    },
                    540: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 3,
                    },
                    1024: {
                        items: 3,
                    },
                    2256: {
                        items: 3,
                    },
                },
            });
        });
    </script>
    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lightgallery/dist/js/lightgallery.js') }}"></script>
    <script src="{{ mix('assets/js/web/plugin.js') }}"></script>
@endsection
