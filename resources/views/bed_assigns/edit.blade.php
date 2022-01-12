@extends('layouts.app')
@section('title')
    {{ __('messages.bed_assign.edit_bed_assign') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.bed_assign.edit_bed_assign') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($bedAssign, ['route' => ['bed-assigns.update', $bedAssign->id], 'method' => 'patch', 'id' => 'editBedAssign']) }}

                            @include('bed_assigns.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let isEdit = true;
        let ipdPatientsList = "{{ route('ipd.patient.list') }}";
    </script>
    <script src="{{mix('assets/js/bed_assign/create-edit.js')}}"></script>
@endsection
