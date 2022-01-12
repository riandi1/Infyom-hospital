@extends('layouts.app')
@section('title')
    {{ __('messages.ambulances') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.ambulances') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status"
                               class="lbl-block"><b>{{ __('messages.ambulance.is_available') }}</b></label><br>
                        {{ Form::select('ambulance_status',$statusArr,null,['id'=>'filter_status','class'=>'form-control status-filter']) }}
                    </div>
                    <div class="mr-0 actions-btn">
                        <div class="btn-group" role="group">
                            <button id="ambulanceActions" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="ambulanceActions" x-placement="bottom-start">
                                <a href="{{ route('ambulances.create') }}" class="dropdown-item">
                                    {{ __('messages.ambulance.new_ambulance') }}
                                </a>
                                <a href="{{ route('ambulance.excel') }}" class="dropdown-item">
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
                            @include('ambulances.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('ambulances.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let ambulanceUrl = "{{ url('ambulances') }}";
    </script>
    <script src="{{mix('assets/js/ambulances/ambulances.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

