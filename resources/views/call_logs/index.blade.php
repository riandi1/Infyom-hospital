@extends('layouts.app')
@section('title')
    {{ __('messages.call_logs') }}
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
                <h3 class="page__heading">{{ __('messages.call_logs') }}</h3>
                <div class="filter-container">
                    <div class="d-flex flex-column mr-2">
                        <label class=""><b>{{ __('messages.call_log.call_type') }}</b></label>
                        {{ Form::select('callType',$callTypeArr,null, ['id' => 'callType', 'class' => 'form-control']) }}
                    </div>
                    <div class="mr-0 actions-btn">
                        <div class="btn-group" role="group">
                            <button id="callLogActions" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="callLogActions" x-placement="bottom-start">
                                <a href="{{ route('call_logs.create') }}"
                                   class="dropdown-item">{{ __('messages.call_log.new') }}</a>
                                <a href="{{ route('call_logs.excel') }}" class="dropdown-item">
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
                            @include('call_logs.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('call_logs.templates.templates')
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
        let callLogUrl = "{{ route('call_logs.index') }}/";
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let incoming = "{{ __('messages.call_log.incoming') }}";
        let outgoing = "{{ __('messages.call_log.outgoing') }}";
        let callTypeIncoming = "{{\App\Models\CallLog::INCOMING}}";
        let isEdit = true;
    </script>
    <script src="{{mix('assets/js/call_logs/call_log.js')}}"></script>
@endsection
