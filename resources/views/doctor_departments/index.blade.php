@extends('layouts.app')
@section('title')
    {{ __('messages.doctor_department.doctor_departments') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.doctor_department.doctor_departments') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.doctor_department.new_doctor_department') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('doctor_departments.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('doctor_departments.templates.templates')
        @include('doctor_departments.create_modal')
        @include('doctor_departments.edit_modal')
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let doctorDepartmentUrl = "{{url('doctor-departments')}}";
        let doctorDepartmentCreateUrl = "{{ route('doctor-departments.store') }}";
    </script>
    <script src="{{ mix('assets/js/doctors_departments/doctors_departments.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
