@extends('layouts.app')
@section('title')
    {{ __('messages.opd_patient.opd_patient_details') }}
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
                            <strong>{{ __('messages.opd_patient.opd_patient_details') }}</strong>
                        </div>
                        <div class="card-body">
                            @include('opd_patient_list.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        $('#OPDtab a').click(function (e) {
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
        $('#OPDtab a[href="' + hash + '"]').tab('show');

        let visitedOPDPatients = "{{ route('patient.opd') }}";
        let patient_id = "{{ $opdPatientDepartment->patient_id }}";
        let opdPatientDepartmentId = "{{ $opdPatientDepartment->id }}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";
        let opdDiagnosisUrl = "{{route('opd.diagnosis.index')}}";
        let downloadDiagnosisDocumentUrl = "{{ url('opd-diagnosis-download')}}";
        let opdTimelinesUrl = "{{route('opd.timelines.index')}}";
        let downloadTimelineDocumentUrl = "{{ url('opd-timeline-download') }}";
        let downloadPaymetDocumentUrl = "{{ url('opdPayment-download') }}";
    </script>
    <script src="{{ mix('assets/js/opd_patients_list/visits.js') }}"></script>
    <script src="{{ mix('assets/js/opd_patients_list/opd_diagnosis.js') }}"></script>
    <script src="{{ mix('assets/js/opd_patients_list/opd_timelines.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
@endsection
