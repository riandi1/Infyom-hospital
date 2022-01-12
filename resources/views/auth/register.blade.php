@extends('layouts.auth_app')

@section('title')
    Register
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@php
    $enquiry = request()->query('enquiry');
@endphp
@section('content')
    @include('flash::message')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Register</h2>
            <!-- Tab panes -->
            <div class="tab-content">
                {{-- Register Tab --}}
                <div class="tab-pane container active" id="register">
                    <div class="col-md-12">
                        <form method="post" action="{{ url('/register') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row mb-md-3 mb-sm-1">
                                <div class="col-md-6 mb-2 mb-md-0 position-relative">
                                    <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}"
                                           name="first_name" value="{{ old('first_name') }}"
                                           placeholder="First Name" required>
                                    <span class="register-required text-danger">*</span>
                                </div>
                                <div class="col-md-6 mb-2 mb-md-0 position-relative">
                                    <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}"
                                           name="last_name" value="{{ old('last_name') }}"
                                           placeholder="Last Name" required>
                                    <span class="register-required text-danger">*</span>
                                </div>
                            </div>
                            <div class="row mb-md-3 mb-sm-1">
                                <div class="col-md-6 mb-2 mb-md-0 position-relative">
                                    <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                           name="email" value="{{ old('email') }}" placeholder="Email" required>
                                    <span class="register-required text-danger">*</span>
                                </div>
                                <div class="col-md-6 mb-2 mb-md-0 position-relative">
                                    <input type="phone" class="form-control {{ $errors->has('phone')?'is-invalid':'' }}"
                                           name="phone" value="{{ old('phone') }}" placeholder="Phone Number"
                                           minlength="10"
                                           maxlength="10"
                                           onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'
                                           required>
                                    <span class="register-required text-danger">*</span>
                                </div>
                            </div>
                            <div class="row mb-md-3 mb-sm-1">
                                <div class="col-md-6 mb-2 mb-md-0 position-relative">
                                    <input type="password"
                                           class="form-control {{ $errors->has('password')?'is-invalid':''}}"
                                           name="password" placeholder="Password" required>
                                    <span class="register-required text-danger">*</span>
                                </div>
                                <div class="col-md-6 mb-3 mb-md-0 position-relative">
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="Confirm password" required>
                                    <span class="register-required text-danger">*</span>
                                </div>
                            </div>
                            <div class="row mb-md-0 mb-sm-1">
                                <div class="col-md-12 col-12 mb-2 mb-md-0">
                                    <div class="form-group position-relative">&nbsp;
                                        {{ Form::label('gender', 'Gender:') }}<span class=" text-danger">*</span>
                                        {{ Form::radio('gender', '0', true) }} Male &nbsp;
                                        {{ Form::radio('gender', '1') }} Female
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                            <a href="{{ url('/login') }}" class="d-block text-center mt-2">I already have an account</a>
                        </form>
                    </div>
                </div>

                {{-- Enquiry Form Tab --}}
                <div class="tab-pane container fade" id="enquiry">
                    <div class="col-md-12">
                        <form method="post" id="enquiryCreateForm" action="{{ route('send.enquiry') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row mb-md-3 mb-sm-1">
                                <div class="col-md-12 mb-3">
                                    <input type="text"
                                           class="form-control {{ $errors->has('full_name')?'is-invalid':'' }}"
                                           name="full_name" value="{{ old('full_name') }}"
                                           placeholder="Full Name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="email"
                                           class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                           name="email" value="{{ old('email') }}"
                                           placeholder="Email" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="tel"
                                           class="form-control {{ $errors->has('contact_no')?'is-invalid':'' }}"
                                           id="phoneNumber" name="contact_no" value="{{ old('contact_no') }}"
                                           placeholder="Contact No" required
                                           onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'>
                                    {{ Form::hidden('prefix_code',null,['id'=>'prefix_code']) }}
                                    <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
                                    <span id="error-msg" class="hide"></span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <select id="type" name="type"
                                            class="form-control {{ $errors->has('type')?'is-invalid':'' }}">
                                        <option value="1">General Inquiry</option>
                                        <option value="2">Feedback/Suggestions</option>
                                        <option value="3">Residential Care</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <textarea rows="5" name="message"
                                              class="form-control {{ $errors->has('message')?'is-invalid':'' }}"
                                              placeholder="Message" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send Enquiry
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = false;
    </script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script>
        $('#enquiryCreateForm').submit(function () {
            if ($('#error-msg').text() !== '') {
                $('#phoneNumber').focus();
                return false;
            }
        });
    </script>
@endsection
