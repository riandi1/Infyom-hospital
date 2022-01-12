@extends('layouts.app')
@section('title')
    {{ __('messages.document_types') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.document_types') }}</h3>
                <div class="filter-container">
                    <a href="#" class="btn btn-primary filter-container__btn" data-toggle="modal"
                       data-target="#AddModal">
                        {{ __('messages.doc_type.new_doc_type') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('document_types.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('document_types.add_modal')
    @include('document_types.edit_modal')
    @include('document_types.templates.templates')
@endsection

@section('page_scripts')
    {{-- Both JS need for load datatble --}}
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let docTypeCreateUrl = "{{route('document-types.store')}}";
        let docTypeUrl = "{{route('document-types.index')}}";
    </script>
    <script src="{{ mix('assets/js/document_type/doc_type.js') }}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>
@endsection

