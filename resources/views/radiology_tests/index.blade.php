@extends('layouts.app')
@section('title')
    {{ __('messages.radiology_tests') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.radiology_tests') }}</h3>
                @if(Auth::user()->hasRole('Lab Technician'))
                    <div class="flex-end-sm">
                        <div class="mr-0">
                            <div class="btn-group" role="group">
                                <button id="radiologyTestsActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="radiologyTestsActions"
                                     x-placement="bottom-start">
                                    <a href="{{ route('radiology.test.create') }}" class="dropdown-item">
                                        {{ __('messages.radiology_test.new_radiology_test') }}
                                    </a>
                                    <a href="{{ route('radiology.tests.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex-end-sm">
                        <a class="btn btn-primary filter-container__btn" href="{{ route('radiology.test.create') }}">
                            {{ __('messages.radiology_test.new_radiology_test') }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('radiology_tests.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('radiology_tests.templates.templates')
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let radiologyTestUrl = "{{url('radiology-tests')}}";
    </script>
    <script src="{{ mix('assets/js/radiology_tests/radiology_tests.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
