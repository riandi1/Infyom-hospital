@extends('layouts.app')
@section('title')
    {{ __('messages.radiology_test.edit_radiology_test') }}
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
                            <strong>{{ __('messages.radiology_test.edit_radiology_test') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($radiologyTest, ['route' => ['radiology.test.update', $radiologyTest->id], 'method' => 'patch', 'id' => 'editRadiologyTest']) }}

                            @include('radiology_tests.edit_fields')

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
        let radiologyTestUrl = "{{url('radiology-tests')}}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{mix('assets/js/radiology_tests/create-edit.js')}}"></script>
@endsection
