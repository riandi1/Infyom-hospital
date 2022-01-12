@extends('layouts.app')
@section('title')
    {{ __('messages.prescriptions') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.prescriptions') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status', $statusArr, null, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                    <a class="btn btn-primary filter-container__btn" href="{{ route('prescriptions.create') }}">
                        {{ __('messages.prescription.new_prescription') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('prescriptions.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('prescriptions.templates.templates')
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let prescriptionUrl = "{{url('prescriptions')}}";
    </script>
    <script src="{{ mix('assets/js/prescriptions/prescriptions.js') }}"></script>
    <script src="{{mix('assets/js/prescriptions/create-edit.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
