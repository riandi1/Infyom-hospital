@extends('layouts.app')
@section('title')
    {{ __('messages.documents') }}
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
                <h3 class="page__heading">{{ __('messages.documents') }}</h3>
                <div class="filter-container">
                    <a href="#" class="btn btn-primary filter-container__btn" data-toggle="modal"
                       data-target="#addModal">
                        {{ __('messages.document.new_document') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('documents.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('documents.add_modal')
    @include('documents.edit_modal')
    @include('documents.templates.templates')
@endsection

@section('page_scripts')
    {{-- Both JS need for load datatble --}}
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let documentsCreateUrl = "{{route('documents.store')}}";
        let documentsUrl = "{{route('documents.index')}}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";
        let downloadDocumentUrl = "{{ url('document-download') }}";
    </script>
    <script src="{{ mix('assets/js/document/document.js') }}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>
@endsection
