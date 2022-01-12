@extends('layouts.app')
@section('title')
    {{ __('messages.pathology_category.pathology_categories') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.pathology_category.pathology_categories') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.pathology_category.new_pathology_category') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('pathology_categories.table')
                        </div>
                        @include('pathology_categories.modal')
                        @include('pathology_categories.edit_modal')
                        @include('pathology_categories.templates.templates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let pathologyCategoryCreateUrl = "{{ route('pathology.category.store') }}";
        let pathologyCategoryUrl = "{{ url('pathology-categories') }}";
    </script>
    <script src="{{ mix('assets/js/pathology_categories/pathology_categories.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
