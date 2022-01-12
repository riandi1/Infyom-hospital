@extends('layouts.app')
@section('title')
    {{ __('messages.account.accounts') }}
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
                <h3 class="page__heading">{{ __('messages.account.accounts') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_type" class="lbl-block"><b>{{ __('messages.account.type') }}</b></label><br>
                        {{ Form::select('account_type',$typeArr,null,['id'=>'filter_type','class'=>'form-control status-filter']) }}
                    </div>
                    <div class="mr-2">
                        <label for="filter_status"
                               class="lbl-block"><b>{{ __('messages.account.status') }}</b></label><br>
                        {{Form::select('account_status',$statusArr,null,['id'=>'filter_status','class'=>'form-control status-filter'])  }}
                    </div>
                    <a href="#" class="btn btn-primary filter-container__btn addAccountModal" data-toggle="modal"
                       data-target="#AddModal">
                        {{ __('messages.account.new_account') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('accounts.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('accounts.add_modal')
    @include('accounts.edit_modal')
    @include('accounts.templates.templates')
@endsection
@section('page_scripts')
    {{-- Both JS need for load datatble --}}
    <script src="{{ asset('assets/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let accountCreateUrl = "{{route('accounts.store')}}";
        let accountUrl = "{{route('accounts.index')}}";
    </script>
    <script src="{{ mix('assets/js/accounts/accounts.js') }}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>
@endsection

