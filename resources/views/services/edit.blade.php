@extends('layouts.app')
@section('title')
    {{ __('messages.service.edit_service') }}
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
                            <strong>{{ __('messages.service.edit_service') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'patch', 'id' => 'editServiceForm']) }}

                            @include('services.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/services/create-edit.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
@endsection
