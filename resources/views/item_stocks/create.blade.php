@extends('layouts.app')
@section('title')
    {{ __('messages.item_stock.new_item_stock') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.item_stock.new_item_stock') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'item.stock.store', 'id' => 'createItemStockForm', 'files' => 'true']) }}

                            @include('item_stocks.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let itemsUrl = "{{ route('items.list') }}";
        let isEdit = false;
    </script>
    <script src="{{ mix('assets/js/item_stocks/create-edit.js') }}"></script>
@endsection
