@extends('layouts.app')
@section('title')
    {{ __('messages.postal_receive') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading"> {{ __('messages.postal_receive') }}</h3>
                <div class="mr-0">
                    <div class="btn-group" role="group">
                        <button id="receiveActions" type="button" class="btn btn-primary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{{ __('messages.common.actions') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dispatchActions" x-placement="bottom-start">
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addModal">
                                {{ __('messages.postal.new_receive') }}
                            </a>
                            <a href="{{ route('receives.excel') }}" class="dropdown-item">
                                {{ __('messages.common.export_to_excel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('postals.receives.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('postals.templates.templates')
        @include('postals.receives.add_modal')
        @include('postals.receives.edit_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let postalUrl = "{{route('receives.index')}}";
        let ispostal = "{{\App\Models\Postal::POSTAL_RECEIVE}}";
        let name = "{{__('messages.postal.receive')}}";
        let postalCreateUrl = "{{route('receives.store')}}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";
        let download = "{{__('messages.expense.download')}}";
        let documentError = "{{__('messages.expense.document_error')}}";
        let tableName = '#receivesTable';
        let hiddenId = '#editReceiveId';
    </script>
    <script src="{{mix('assets/js/postals/postal.js')}}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
