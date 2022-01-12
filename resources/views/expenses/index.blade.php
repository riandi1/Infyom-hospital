@extends('layouts.app')
@section('title')
    {{ __('messages.expenses') }}
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
                <h3 class="page__heading">{{__('messages.expenses')}}</h3>
                <div class="filter-container">
                    <div class="d-flex flex-column mr-2">
                        <label class=""><b>{{ __('messages.expense.expense_head') }}</b></label>
                        {{ Form::select('expense_head',$filterExpenseHeads,null, ['id' => 'expenseHead', 'class' => 'form-control status-filter']) }}
                    </div>
                    <div class="mr-0 actions-btn">
                        <div class="btn-group" role="group">
                            <button id="expenseActions" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="expenseActions" x-placement="bottom-start">
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addModal">
                                    {{ __('messages.expense.new_expense') }}
                                </a>
                                <a href="{{ route('expenses.excel') }}" class="dropdown-item">
                                    {{ __('messages.common.export_to_excel') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('expenses.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('expenses.templates.templates')
        @include('expenses.create_modal')
        @include('expenses.edit_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let expenseUrl = "{{url('expenses')}}";
        let expenseCreateUrl = "{{route('expenses.store')}}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";
        let expenseHeadArray = JSON.parse('@json($expenseHeads)');
        let download = "{{__('messages.expense.download')}}";
        let documentError = "{{__('messages.expense.document_error')}}";
        let downloadDocumentUrl = "{{ url('expense-download') }}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{mix('assets/js/expenses/expenses.js')}}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
