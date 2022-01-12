@extends('layouts.app')
@section('title')
    {{ __('messages.medicine_categories') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.medicine_categories') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status', $statusArr, null, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                    <a class="btn btn-primary filter-container__btn px-xs-5 font-sm" href="#" data-toggle="modal"
                       data-target="#addModal">
                        {{ __('messages.medicine.new_medicine_category') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('categories.table')
                        </div>
                        @include('categories.modal')
                        @include('categories.edit_modal')
                        @include('categories.templates.templates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let categoryCreateUrl = "{{ route('categories.store') }}";
        let categoriesUrl = "{{ url('categories') }}";
    </script>
    <script src="{{ mix('assets/js/category/category.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
