@extends('layouts.app')
@section('title')
    {{ __('messages.diagnosis_category.diagnosis_category') }}
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
                    <a href="{{ url()->previous() }}"
                       class="btn btn-primary pull-right">{{ __('messages.common.back') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.diagnosis_category.diagnosis_category_details') }}</strong>
                        </div>
                        <div class="card-body">
                            @include('diagnosis_categories.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
