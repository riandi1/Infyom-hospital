@extends('layouts.app')
@section('title')
    {{ __('messages.medicine.medicines') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.medicine.medicines') }}</h3>
                @if(Auth::user()->hasRole('Pharmacist'))
                    <div class="filter-container">
                        <div class="mr-0">
                            <div class="btn-group" role="group">
                                <button id="medicinesActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="medicinesActions"
                                     x-placement="bottom-start">
                                    <a href="{{ route('medicines.create') }}" class="dropdown-item">
                                        {{ __('messages.medicine.new_medicine') }}
                                    </a>
                                    <a href="{{ route('medicines.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex-end-sm">
                        <a class="btn btn-primary filter-container__btn" href="{{ route('medicines.create') }}">
                            {{ __('messages.medicine.new_medicine') }}
                        </a>
                    </div>

                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('medicines.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('medicines.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let medicineUrl = "{{route('medicines.index')}}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{mix('assets/js/medicines/medicines.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

