@extends('layouts.app')
@section('title')
    {{ __('messages.hospital_blood_bank.blood_bank') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.hospital_blood_bank.blood_bank') }}</h3>
                @if(Auth::user()->hasRole('Lab Technician'))
                    <div class="flex-end-sm">
                        <div class="mr-0">
                            <div class="btn-group" role="group">
                                <button id="bloodBankActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="bloodBankActions"
                                     x-placement="bottom-start">
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addModal">
                                        {{ __('messages.hospital_blood_bank.new_blood_group') }}
                                    </a>
                                    <a href="{{ route('blood.banks.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex-end-sm">
                        <a class="btn btn-primary filter-container__btn" href="#" data-toggle="modal"
                           data-target="#addModal">
                            {{ __('messages.hospital_blood_bank.new_blood_group') }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('blood_banks.table')
                        </div>
                        @include('blood_banks.modal')
                        @include('blood_banks.edit_modal')
                        @include('blood_banks.templates.templates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let bloodBankCreateUrl = "{{ route('blood-banks.store') }}";
        let bloodBankUrl = "{{ url('blood-banks') }}";
    </script>
    <script src="{{ mix('assets/js/blood_banks/blood_banks.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
