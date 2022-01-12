@extends('layouts.app')
@section('title')
    {{ __('messages.pathology_test.new_pathology_test') }}
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
                            <strong>{{ __('messages.pathology_test.new_pathology_test') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'pathology.test.store', 'id' => 'createPathologyTest']) }}

                            @include('pathology_tests.fields')

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
        let pathologyTestUrl = "{{url('pathology-tests')}}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{mix('assets/js/pathology_tests/create-edit.js')}}"></script>
@endsection
