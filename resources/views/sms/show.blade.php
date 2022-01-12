@extends('layouts.app')
@section('title')
    {{__('messages.sms.sms')}}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="d-flex justify-content-end py-2">
                <div>
                    <a href="{{ route('sms.index') }}"
                       class="btn btn-primary pull-right">{{ __('messages.common.back') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{__('messages.sms.sms_details')}}</strong>
                        </div>
                        <div class="card-body">
                            @include('sms.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
