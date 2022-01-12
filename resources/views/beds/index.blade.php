@extends('layouts.app')
@section('title')
    {{ __('messages.bed.beds') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.bed.beds') }}</h3>
                <div class="mr-0">
                    <div class="btn-group" role="group">
                        <button id="bedActions" type="button" class="btn btn-primary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{{ __('messages.common.actions') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="bedActions" x-placement="bottom-start">
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addModal">
                                {{ __('messages.bed.bed') }}
                            </a>
                            <a href="{{ route('create.bulk.beds') }}" class="dropdown-item">
                                {{ __('messages.bed.new_bulk_bed') }}
                            </a>
                            @if(Auth::user()->hasRole('Nurse'))
                                <a href="{{ route('beds.excel') }}" class="dropdown-item">
                                    {{ __('messages.common.export_to_excel') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('beds.table')
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('beds.create_modal')
        @include('beds.edit_modal')
        @include('beds.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let bedUrl = "{{url('beds')}}";
        let bedCreateUrl = "{{ route('beds.store') }}";
        let bedTypesUrl = "{{url('bed-types')}}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{ mix('assets/js/beds/beds.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/beds/create-edit.js') }}"></script>
@endsection

