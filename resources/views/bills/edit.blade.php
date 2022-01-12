@extends('layouts.app')
@section('title')
    {{ __('messages.bill.edit_bill') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('css')
    <link href="{{ asset('assets/css/bill.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid mt-3">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.bill.edit_bill') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($bill, ['route' => ['bills.update', $bill->id], 'id' => 'billForm']) }}

                            @include('bills.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('bills.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let billSaveUrl = "{{ route('bills.update', $bill->id) }}";
        let billUrl = "{{ route('bills.index') }}";
        let associateMedicines = JSON.parse('@json($associateMedicines)');
        let uniqueId = "{{ $bill->billItems->count() + 1 }}";
        let billDate = "{{ $bill->bill_date->format('Y-m-d h:i A') }}";
        let patientAdmissionDetailUrl = "{{url('patient-admission-details')}}";
        let patientAdmissionId = "{{ $bill->patient_admission_id }}";
        let billId = "{{ $bill->id }}";
        let isEdit = true;
    </script>
    <script src="{{mix('assets/js/bills/edit.js')}}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{mix('assets/js/bills/new.js')}}"></script>
@endsection
