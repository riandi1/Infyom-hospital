@extends('layouts.app')
@section('title')
    {{ __('messages.ipd_patient.ipd_patient_details') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection

@section('css')
    <link href="{{ asset('assets/css/timeline.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="d-flex justify-content-end py-2">
                <div>
                    <a href="{{ route('ipd.patient.index') }}"
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
                            @include('ipd_patient_departments.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('ipd_diagnoses.add_modal')
    @include('ipd_diagnoses.edit_modal')
    @include('ipd_consultant_registers.add_modal')
    @include('ipd_consultant_registers.edit_modal')
    @include('ipd_charges.add_modal')
    @include('ipd_charges.edit_modal')
    @include('ipd_prescriptions.add_modal')
    @include('ipd_prescriptions.edit_modal')
    @include('ipd_prescriptions.show_modal')
    @include('ipd_timelines.add_modal')
    @include('ipd_timelines.edit_modal')
    @include('ipd_diagnoses.templates.templates')
    @include('ipd_consultant_registers.templates.templates')
    @include('ipd_charges.templates.templates')
    @include('ipd_prescriptions.templates.templates')
    @include('ipd_payments.add_modal')
    @include('ipd_payments.edit_modal')
    @include('ipd_payments.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let ipdDiagnosisCreateUrl = "{{route('ipd.diagnosis.store')}}";
        let ipdDiagnosisUrl = "{{route('ipd.diagnosis.index')}}";
        let ipdConsultantRegisterUrl = "{{route('ipd.consultant.index')}}";
        let ipdConsultantRegisterCreateUrl = "{{route('ipd.consultant.store')}}";
        let ipdChargesUrl = "{{route('ipd.charge.index')}}";
        let ipdChargesCreateUrl = "{{route('ipd.charge.store')}}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";
        let ipdPatientDepartmentId = "{{ $ipdPatientDepartment->id }}";
        let ipdPatientCaseDate = "{{ $ipdPatientDepartment->patientCase->date }}";

        let doctorUrl = "{{url('doctors')}}";
        let doctors = JSON.parse('@json($doctorsList)');
        let uniqueId = 2;
        let chargeCategoryUrl = "{{ route('charge.category.list') }}";
        let chargeUrl = "{{ route('charge.list') }}";
        let chargeStandardRateUrl = "{{ route('charge.standard.rate') }}";
        let ipdPrescriptionUrl = "{{route('ipd.prescription.index')}}";
        let ipdPrescriptionCreateUrl = "{{route('ipd.prescription.store')}}";
        let medicineCategories = JSON.parse('@json($medicineCategoriesList)');
        let medicinesListUrl = "{{ route('medicine.list') }}";
        let ipdTimelineCreateUrl = "{{route('ipd.timelines.store')}}";
        let ipdTimelinesUrl = "{{route('ipd.timelines.index')}}";
        let ipdPaymentCreateUrl = "{{route('ipd.payments.store')}}";
        let ipdPaymentUrl = "{{route('ipd.payments.index')}}";
        let ipdPaymentModes = JSON.parse('@json($paymentModes)');
        let ipdBillSaveUrl = "{{ route('ipd.bills.store') }}";
        let downloadDiagnosisDocumentUrl = "{{ url('ipd-diagnosis-download') }}";
        let downloadPaymetDocumentUrl = "{{ url('ipd-payment-download') }}";
        let downloadTimelineDocumentUrl = "{{ url('ipd-timeline-download') }}";
        let isEditBill = "@if($ipdPatientDepartment->bill) {{ 1 }} @endif";
        let bootstarpUrl = "{{ asset('assets/css/bootstrap.min.css') }}";
        let billstaus = "{{$ipdPatientDepartment->bill_status}}";
        let actionAcoumnVisibal = "{{ ($ipdPatientDepartment->bill_status) ? false : true }}";

        $('#IPDtab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        // store the currently selected tab in the hash value
        $('ul.nav-tabs > li > a').on('shown.bs.tab', function (e) {
            var id = $(e.target).attr('href').substr(1);
            window.location.hash = id;
        });
        // on load of the page: switch to the currently selected tab
        var hash = window.location.hash;
        $('#IPDtab a[href="' + hash + '"]').tab('show');
    </script>
    <script src="{{ mix('assets/js/ipd_diagnosis/ipd_diagnosis.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_consultant_register/ipd_consultant_register.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_charges/ipd_charges.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_prescriptions/ipd_prescriptions.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_timelines/ipd_timelines.js') }}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_payments/ipd_payments.js') }}"></script>
    <script src="{{ mix('assets/js/ipd_bills/ipd_bills.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
@endsection
