@extends('layouts.app')
@section('title')
    {{ __('messages.schedules') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.schedules') }}</h3>
                <div class="filter-container">
                    @if(Auth::user()->hasRole('Doctor'))
                        <div class="mr-0">
                            <div class="btn-group" role="group">
                                <button id="schedulesActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="schedulesActions"
                                     x-placement="bottom-start">
                                    <a href="{{ route('schedules.create') }}" class="dropdown-item">
                                        {{ __('messages.schedule.new') }}
                                    </a>
                                    <a href="{{ route('schedules.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="btn btn-primary filter-container__btn" href="{{ route('schedules.create') }}">
                            {{ __('messages.schedule.new') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('schedules.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('schedules.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let scheduleUrl = "{{ url('schedules') }}";
        let doctorUrl = "{{ url('doctors') }}";
    </script>
    <script src="{{mix('assets/js/schedules/schedules.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
