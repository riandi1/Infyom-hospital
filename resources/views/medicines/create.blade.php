@extends('layouts.app')
@section('title')
    {{ __('messages.medicine.new_medicine') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.medicine.new_medicine') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'medicines.store', 'id' => 'createMedicine']) }}
                            <div class="row">
                                @include('medicines.fields')
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{ mix('assets/js/medicines/new.js') }}"></script>
@endsection
