@extends('layouts.app')
@section('title')
    {{ __('messages.user.edit_user') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
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
                            <strong>{{ __('messages.user.edit_user') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($user, ['route' => ['users.update', $user->id], 'files' => 'true', 'method' => 'patch', 'id' => 'editUserForm']) }}
                            @include('users.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let userUrl = "{{ route('users.index') }}";
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let phoneNo = "{{ old('prefix_code').old('phone') }}";
        let isEdit = true;
    </script>
    <script src="{{ mix('assets/js/users/create-edit.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
@endsection

