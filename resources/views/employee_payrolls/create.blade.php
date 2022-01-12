@extends('layouts.app')
@section('title')
    {{ __('messages.employee_payroll.new_employee_payroll') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.employee_payroll.new_employee_payroll') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'employee-payrolls.store', 'id' => 'createPayroll']) }}

                            @include('employee_payrolls.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let employeeUrl = "{{ route('employees.list') }}";
        let isEdit = false;
    </script>
@endsection
@section('page_scripts')
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{ mix('assets/js/employee_payrolls/payrolls.js') }}"></script>
@endsection
