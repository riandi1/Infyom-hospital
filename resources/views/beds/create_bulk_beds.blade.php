@extends('layouts.app')
@section('title')
    {{ __('messages.bed.new_bulk_bed') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
            <div class="row mt-4 bulk_bed">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.bed.new_bulk_bed') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'store.bulk.beds', 'id' => 'bulkBedsForm']) }}

                            @include('beds.bulk_beds_fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('beds.templates.templates')
    </div>
@endsection
@section('scripts')
    <script>
        let bedUrl = "{{route('beds.index')}}";
        let bulkBedSaveUrl = "{{route('store.bulk.beds')}}";
        let bedTypes = JSON.parse('@json($associateBedTypes)');
        ;

        let uniqueId = 2;
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{ mix('assets/js/beds/bulk_beds.js') }}"></script>
    <script src="{{ mix('assets/js/beds/create-edit.js') }}"></script>
@endsection
