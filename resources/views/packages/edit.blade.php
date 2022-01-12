@extends('layouts.app')
@section('title')
    {{ __('messages.package.edit_package') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('css')
    <link href="{{ asset('assets/css/bill.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.package.edit_package') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($package, ['route' => ['packages.update', $package->id], 'id'=>'packageForm']) }}

                            @include('packages.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('packages.templates.templates')
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let packageSaveUrl = "{{ route('packages.update', $package->id) }}";
        let packageUrl = "{{route('packages.index')}}";
        let associateServices = JSON.parse('@json($services)');
        let uniqueId = "{{ $package->packageServicesItems->count() + 1 }}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{ mix('assets/js/packages/create-edit.js') }}"></script>
@endsection
