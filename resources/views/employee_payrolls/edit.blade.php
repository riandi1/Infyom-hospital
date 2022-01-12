@extends('layouts.app')
@section('title')
    {{ __('messages.employee_payroll.edit_employee_payroll') }}
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
                            <strong>{{ __('messages.employee_payroll.edit_employee_payroll') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($employeePayroll, ['route' => ['employee-payrolls.update', $employeePayroll->id], 'method' => 'patch','id' => 'editPayroll']) }}

                            @include('employee_payrolls.edit_fields')

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
        let employeeOwnerId = "{{ $employeePayroll->owner_id }}";
        let isEdit = true;
    </script>
@endsection
@section('page_scripts')
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{ mix('assets/js/employee_payrolls/edit.js') }}"></script>
    <script src="{{ mix('assets/js/employee_payrolls/payrolls.js') }}"></script>
@endsection
