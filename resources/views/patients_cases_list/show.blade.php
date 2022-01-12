@extends('layouts.app')
@section('title')
    Patients Case Details
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="d-flex justify-content-end py-2">
                <div>
                    <a href="{{ url()->previous()}}" class="btn btn-primary pull-right">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Patients Case Details</strong>
                        </div>
                        <div class="card-body">
                            @include('patients_cases_list.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
