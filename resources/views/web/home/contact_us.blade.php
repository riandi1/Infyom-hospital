@extends('web.layouts.front')
@section('title')
    Contact Us
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lightgallery/dist/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lightgallery/dist/css/lg-transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@php
    $enquiry = request()->query('enquiry');
@endphp
@section('content')
    <h1 class="text-center contact-heading mt-4">Contact Us</h1>
    <div class="container">
        <div class="row justify-content-center contact-form">
            <div class="col-md-8 mx-auto my-5">
                <form method="post" id="enquiryCreateForm" action="{{ route('send.enquiry') }}">
                    @csrf
                    @include('flash::message')
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
                        </div>
                        <span id="valid-msg" class="hide">✓ Valid</span>
                        <span id="error-msg" class="hide"></span>
                        <div class="col-md-12 mb-3">
                            <select id="type" name="type"
                                    class="form-control {{ $errors->has('type')?'is-invalid':'' }}">
                                <option value="1">General Inquiry</option>
                                <option value="2">Feedback/Suggestions</option>
                                <option value="3">Residential Care</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                                    <textarea name="message"
                                              class="min-height form-control {{ $errors->has('message')?'is-invalid':'' }}"
                                              placeholder="Message" required>{{ old('message') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="btnContact" class="btn btn-primary btn-flat send-enquiry-btn">Send
                                Enquiry
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('page_scripts')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let phoneNo = "{{ old('prefix_code').old('contact_no') }}";
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
    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lightgallery/dist/js/lightgallery.js') }}"></script>
    <script src="{{ mix('assets/js/web/plugin.js') }}"></script>
@endsection
