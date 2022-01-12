@extends('layouts.app')
@section('title')
    {{ __('messages.visitors') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.visitors') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label class=""><b>{{ __('messages.visitor.purpose') }}</b></label>
                        {{ Form::select('purpose',$purpose,null, ['id' => 'purposeArr', 'class' => 'form-control status-filter']) }}
                    </div>
                    <div class="mr-0 actions-btn">
                        <div class="btn-group" role="group">
                            <button id="visitorActions" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="visitorActions" x-placement="bottom-start">
                                <a href="{{ route('visitors.create') }}"
                                   class="dropdown-item">{{ __('messages.visitor.new') }}</a>
                                <a href="{{ route('visitors.excel') }}" class="dropdown-item">
                                    {{ __('messages.common.export_to_excel') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('visitors.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('visitors.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let visitorUrl = "{{ route('visitors.index') }}/";
        let downloadDocumentUrl = "{{ url('visitors-download') }}";
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = true;
    </script>
    <script src="{{mix('assets/js/visitors/visitor.js')}}"></script>
@endsection
