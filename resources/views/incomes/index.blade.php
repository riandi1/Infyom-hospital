@extends('layouts.app')
@section('title')
    {{__('messages.incomes.incomes')}}
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
                <h3 class="page__heading">{{__('messages.incomes.incomes')}}</h3>
                <div class="filter-container">
                    <div class="d-flex flex-column mr-2">
                        <label class=""><b>{{ __('messages.incomes.income_head') }}</b></label>
                        {{ Form::select('income_head',$filterIncomeHeads,null, ['id' => 'incomeHead', 'class' => 'form-control status-filter']) }}
                    </div>
                    <div class="mr-0 actions-btn">
                        <div class="btn-group" role="group">
                            <button id="incomeActions" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="incomeActions" x-placement="bottom-start">
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addModal">
                                    {{ __('messages.incomes.new_income') }}
                                </a>
                                <a href="{{ route('incomes.excel') }}" class="dropdown-item">
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
                            @include('incomes.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('incomes.templates.templates')
        @include('incomes.create_modal')
        @include('incomes.edit_modal')
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
        let incomeUrl = "{{url('incomes')}}";
        let incomeCreateUrl = "{{route('incomes.store')}}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";
        let incomeHeadArray = JSON.parse('@json($incomeHeads)');
        let download = '{{__('messages.incomes.download')}}';
        let documentError = "{{__('messages.incomes.document_error')}}";
        let downloadDocumentUrl = "{{ url('income-download') }}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{mix('assets/js/incomes/incomes.js')}}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
