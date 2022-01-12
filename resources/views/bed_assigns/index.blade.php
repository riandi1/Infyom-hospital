@extends('layouts.app')
@section('title')
    {{ __('messages.bed_assign.bed_assigns') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.bed_assign.bed_assigns') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status', $statusArr, 2, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                    <div class="mr-0 actions-btn">
                        <div class="btn-group" role="group">
                            <button id="bedAssignActions" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="bedAssignActions" x-placement="bottom-start">
                                <a href="{{ route('bed-status') }}" class="dropdown-item">
                                    {{ __('messages.bed_status.bed_status') }}
                                </a>
                                <a href="{{ route('bed-assigns.create') }}" class="dropdown-item">
                                    {{ __('messages.bed_assign.new_bed_assign') }}
                                </a>
                                @if(Auth::user()->hasRole('Nurse|Doctor'))
                                    <a href="{{ route('bed.assigns.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @include('bed_assigns.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('bed_assigns.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let bedAssignUrl = "{{ url('bed-assigns') }}";
        let bedUrl = "{{url('beds')}}";
        let patientUrl = "{{url('patients')}}";
        let caseUrl = "{{ url('patient-cases') }}";
    </script>
    <script src="{{mix('assets/js/bed_assign/bed_assign.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
