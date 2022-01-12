@extends('layouts.app')
@section('title')
    {{ __('messages.users') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading"> {{ __('messages.users') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label><b>{{ __('messages.common.status') }}</b></label>
                        {{ Form::select('status',['' => 'All'] +$status,null, ['id' => 'statusArr', 'class' => 'form-control status-filter']) }}
                    </div>
                    <div class="mr-2">
                        <label><b>{{ __('messages.employee_payroll.role') }}</b></label>
                        {{ Form::select('department_id',['' => 'Select Role'] +$roles,null, ['id' => 'roleArr', 'class' => 'form-control status-filter']) }}
                    </div>
                    <div class="mr-1 actions-btn">
                        <a href="{{ route('users.create') }}"
                           class="btn btn-primary">{{__('messages.user.new_user')}}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('users.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('users.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let userUrl = "{{route('users.index')}}";
        let userShowUrl = "{{route('users.show')}}";
        let isEdit = true;
    </script>
    <script src="{{mix('assets/js/users/user.js')}}"></script>
@endsection
