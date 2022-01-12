@extends('layouts.app')
@section('title')
    {{ __('messages.bed_type.bed_types') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.bed_type.bed_types') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.bed_type.new_bed_type') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('bed_types.table')
                        </div>
                        @include('bed_types.modal')
                        @include('bed_types.edit_modal')
                    </div>
                </div>
            </div>
        </div>
        @include('bed_types.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let bedTypesCreateUrl = "{{ route('bed-types.store') }}";
        let bedTypesUrl = "{{ url('bed-types') }}";
    </script>
    <script src="{{ mix('assets/js/bed_types/bed_types.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
