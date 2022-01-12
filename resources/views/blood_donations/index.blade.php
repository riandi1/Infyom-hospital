@extends('layouts.app')
@section('title')
    {{ __('messages.blood_donations') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.blood_donations') }}</h3>
                @if(Auth::user()->hasRole('Lab Technician'))
                    <div class="flex-end-sm">
                        <div class="mr-0">
                            <div class="btn-group" role="group">
                                <button id="bloodDonationActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="bloodDonationActions"
                                     x-placement="bottom-start">
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addModal">
                                        {{ __('messages.blood_donation.new_blood_donation') }}
                                    </a>
                                    <a href="{{ route('blood.donations.excel') }}" class="dropdown-item">
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
                            {{ __('messages.blood_donation.new_blood_donation') }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('blood_donations.table')
                        </div>
                        @include('blood_donations.add_modal')
                        @include('blood_donations.edit_modal')
                        @include('blood_donations.templates.templates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let bloodDonationCreateUrl = "{{ route('blood-donations.store') }}";
        let bloodDonationUrl = "{{route('blood-donations.index')}}";
    </script>
    <script src="{{ mix('assets/js/blood_donations/blood_donations.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
