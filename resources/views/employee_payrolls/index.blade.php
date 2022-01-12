@extends('layouts.app')
@section('title')
    {{ __('messages.employee_payroll.employee_payrolls') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.employee_payroll.employee_payrolls') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.account.status') }}</b></label>
                        {{Form::select('status', $statusArr, null, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                    @if(Auth::user()->hasRole('Accountant'))
                        <div class="mr-0 actions-btn">
                            <div class="btn-group" role="group">
                                <button id="employeePayrollsActions" type="button"
                                        class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="employeePayrollsActions"
                                     x-placement="bottom-start">
                                    <a href="{{ route('employee-payrolls.create') }}" class="dropdown-item">
                                        {{ __('messages.employee_payroll.new_employee_payroll') }}
                                    </a>
                                    <a href="{{ route('employee.payrolls.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="btn btn-primary filter-container__btn px-xs-5"
                           href="{{ route('employee-payrolls.create') }}">
                            {{ __('messages.employee_payroll.new_employee_payroll') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('employee_payrolls.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let employeePayrollUrl = "{{url('employee-payrolls')}}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{ mix('assets/js/employee_payrolls/employee_payrolls.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
