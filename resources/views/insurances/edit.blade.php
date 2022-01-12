@extends('layouts.app')
@section('title')
    {{ __('messages.insurance.edit_insurance') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.insurance.edit_insurance') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($insurance, ['id'=>'insuranceForm']) }}

                            @include('insurances.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('insurances.templates.templates')
    </div>
@endsection
@section('scripts')
    <script>
        let insuranceSaveUrl = "{{route('insurances.update', $insurance->id)}}";
        let insuranceUrl = "{{route('insurances.index')}}";
        let uniqueId = "{{ $diseases->count() + 1 }}";
        let discount = "{{$insurance->discount}}";
    </script>
    <script src="{{ mix('assets/js/insurances/create-edit.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
@endsection
