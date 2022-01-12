@extends('layouts.app')
@section('title')
    {{__('messages.bed_status.bed_status')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="d-flex justify-content-end py-2">
                <div>
                    <a href="{{ route('bed-assigns.index') }}"
                       class="btn btn-primary pull-right">{{ __('messages.common.back') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{__('messages.bed_status.bed_status')}}</strong>&nbsp;&nbsp;
                            <i class="fas fa-procedures fa-2x assigned-bed"></i>{{__('messages.bed_status.assigned_beds')}}
                            &nbsp;&nbsp;
                            <i class="fas fa-bed fa-2x unassigned-bed"></i>{{__('messages.bed_status.available_beds')}}
                        </div>
                        <div class="card-body">
                            @include('bed_status.bed_status')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
