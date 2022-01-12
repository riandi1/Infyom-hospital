@extends('layouts.app')
@section('title')
    {{ __('messages.pathology_test.edit_pathology_test') }}
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
                            <strong>{{ __('messages.pathology_test.edit_pathology_test') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($pathologyTest, ['route' => ['pathology.test.update', $pathologyTest->id], 'method' => 'patch', 'id' => 'editPathologyTest']) }}

                            @include('pathology_tests.edit_fields')

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
