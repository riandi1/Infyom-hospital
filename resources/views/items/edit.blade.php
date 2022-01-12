@extends('layouts.app')
@section('title')
    {{ __('messages.item.edit_item') }}
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
                            <strong>{{ __('messages.item.edit_item') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'patch', 'id' => 'editItemForm']) }}

                            @include('items.edit_fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/items/create-edit.js') }}"></script>
@endsection
