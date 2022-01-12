@extends('layouts.app')
@section('title')
    {{ __('messages.issued_item.new_issued_item') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
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
                            <strong>{{ __('messages.issued_item.new_issued_item') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'issued.item.store', 'id' => 'createIssuedItemForm']) }}

                            @include('issued_items.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let usersUrl = "{{ route('users.list') }}";
        let itemsUrl = "{{ route('items.list') }}";
        let itemAvailableQtyUrl = "{{ route('item.available.qty') }}";
    </script>
    <script src="{{ mix('assets/js/issued_items/create.js') }}"></script>
@endsection
