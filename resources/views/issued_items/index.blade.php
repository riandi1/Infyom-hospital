@extends('layouts.app')
@section('title')
    {{ __('messages.issued_item.issued_items') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.issued_item.issued_items') }}</h3>


                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status"
                               class="lbl-block"><b>{{ __('messages.common.status') }}</b></label><br>
                        {{Form::select('status',$statusArr,null,['id'=>'filter_status','class'=>'form-control status-filter'])  }}
                    </div>
                    <a class="btn btn-primary filter-container__btn px-xs-5" href="{{ route('issued.item.create') }}">
                        {{ __('messages.issued_item.new_issued_item') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('issued_items.table')
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('issued_items.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let issuedItemUrl = "{{url('issued-items')}}";
        let returnIssuedItemUrl = "{{url('return-issued-item')}}";
    </script>
    <script src="{{ mix('assets/js/issued_items/issued_items.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
