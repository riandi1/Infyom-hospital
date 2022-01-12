@extends('layouts.app')
@section('title')
    {{ __('messages.mail') }}
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
                            <strong>{{ __('messages.mail') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'mail.send', 'files' => 'true']) }}

                            @include('mail.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/mail/mail.js') }}"></script>
@endsection
