@extends('layouts.app')
@section('title')
    {{ __('messages.vaccinations') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.vaccinations') }}</h3>
                <div class="flex-end-sm">
                    <a class="btn btn-primary filter-container__btn" href="#" data-toggle="modal"
                       data-target="#addModal">
                        {{ __('messages.vaccination.new_vaccination') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('vaccinations.table')
                        </div>
                        @include('vaccinations.add_modal')
                        @include('vaccinations.edit_modal')
                        @include('vaccinations.templates.templates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script>
        let vaccinationCreateUrl = "{{ route('vaccinations.store') }}";
        let vaccinationUrl = "{{ route('vaccinations.index') }}";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/vaccinations/vaccinations.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
