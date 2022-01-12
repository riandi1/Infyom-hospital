@extends('layouts.app')
@section('title')
    {{ __('messages.diagnosis_category.diagnosis_categories') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.diagnosis_category.diagnosis_categories') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.diagnosis_category.new_diagnosis_category') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('diagnosis_categories.table')
                        </div>
                        @include('diagnosis_categories.modal')
                        @include('diagnosis_categories.edit_modal')
                        @include('diagnosis_categories.templates.templates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let diagnosisCategoryCreateUrl = "{{ route('diagnosis.category.store') }}";
        let diagnosisCategoryUrl = "{{ url('diagnosis-categories') }}";
    </script>
    <script src="{{ mix('assets/js/diagnosis_category/diagnosis_category.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
