@extends('layouts.app')
@section('title')
    {{ __('messages.prescription.new_prescription') }}
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
                            <strong>{{ __('messages.prescription.new_prescription') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'prescriptions.store', 'id' => 'createPrescription']) }}

                            @include('prescriptions.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{mix('assets/js/prescriptions/create-edit.js')}}"></script>
@endsection
