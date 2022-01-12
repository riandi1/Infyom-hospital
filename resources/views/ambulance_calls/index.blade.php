@extends('layouts.app')
@section('title')
    {{ __('messages.ambulance_call.ambulance_calls') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.ambulance_call.ambulance_calls') }}</h3>
                @if(Auth::user()->hasRole('Case Manager'))
                    <div class="flex-end-sm">
                        <div class="mr-0">
                            <div class="btn-group" role="group">
                                <button id="ambulanceCallsActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="ambulanceCallsActions"
                                     x-placement="bottom-start">
                                    <a href="{{ route('ambulance-calls.create') }}" class="dropdown-item">
                                        {{ __('messages.ambulance_call.new_ambulance_call') }}
                                    </a>
                                    <a href="{{ route('ambulance.calls.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex-end-sm">
                        <a class="btn btn-primary filter-container__btn" href="{{ route('ambulance-calls.create') }}">
                            {{ __('messages.ambulance_call.new_ambulance_call') }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('ambulance_calls.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('ambulance_calls.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let ambulanceCallUrl = "{{ url('ambulance-calls') }}";
        let patientUrl = "{{url('patients')}}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{mix('assets/js/ambulance_call/ambulance_calls.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

