@extends('layouts.app')
@section('title')
    {{ __('messages.testimonials') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.testimonials') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.testimonial.new_testimonial') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('testimonials.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('testimonials.templates.templates')
        @include('testimonials.add_modal')
        @include('testimonials.edit_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let testimonialUrl = "{{ route('testimonials.index') }}";
        let testimonialCreateUrl = "{{ route('testimonials.store') }}";
        let profileError = "{{__('messages.testimonial.profile_error')}}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";
    </script>
    <script src="{{mix('assets/js/testimonials/testimonial.js')}}"></script>
@endsection

