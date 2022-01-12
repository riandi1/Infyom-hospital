@extends('layouts.app')
@section('title')
    {{ __('messages.ipd_patient.ipd_patient_details') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('css')
    <link href="{{ asset('assets/css/timeline.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="d-flex justify-content-end py-2">
                <div>
                    <a href="{{ url()->previous() }}"
                       class="btn btn-primary pull-right">{{ __('messages.common.back') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.ipd_patient.ipd_patient_details') }}</strong>
                        </div>
                        <div class="card-body">
                            @include('ipd_patient_list.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('ipd_prescriptions.show_modal')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let ipdDiagnosisUrl = "{{route('ipd.diagnosis.index')}}";
        let ipdConsultantRegisterUrl = "{{route('ipd.consultant.index')}}";
        let ipdChargesUrl = "{{route('ipd.charge.index')}}";
        let ipdPatientDepartmentId = "{{ $ipdPatientDepartment->id }}";
        let doctorUrl = "{{url('doctors')}}";
        let ipdPrescriptionUrl = "{{route('ipd.prescription.index')}}";
        let ipdTimelinesUrl = "{{route('ipd.timelines.index')}}";
        let ipdPaymentUrl = "{{route('ipd.payments.index')}}";
        let ipdPaymentModes = JSON.parse('@json($paymentModes)');
        let stripe = Stripe('{{ config('services.stripe.key') }}');
        let ipdStripePaymentUrl = '{{ url('stripe-charge') }}';
        let downloadDiagnosisDocumentUrl = "{{ url('ipd-diagnosis-download') }}";
        let downloadPaymetDocumentUrl = "{{ url('ipd-payment-download') }}";
        let downloadTimelineDocumentUrl = "{{ url('ipd-timeline-download') }}";
        let bootstarpUrl = "{{ asset('assets/css/bootstrap.min.css') }}";
    </script>
    <script src="{{ mix('assets/js/ipd_patients_list/ipd_diagnosis.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_patients_list/ipd_consultant_register.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_patients_list/ipd_charges.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_patients_list/ipd_prescriptions.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_patients_list/ipd_timelines.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{ mix('assets/js/ipd_patients_list/ipd_payments.js') }}"></script>

    <script src="{{ mix('assets/js/ipd_patients_list/ipd_stripe_payment.js') }}"></script>
@endsection
