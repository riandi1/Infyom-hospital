@extends('web.layouts.front')
@section('title')
    About Us
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lightgallery/dist/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lightgallery/dist/css/lg-transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('content')
    <h1 class="text-center contact-heading mt-4">About Us</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6"><img class="img-responsive"
                                                            src="{{ $frontSetting['about_us_image'] }}" height="350">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <h2 class="mt0">{{ $frontSetting['about_us_title'] }}</h2>

                            @if($frontSetting['about_us_description'] == substr($frontSetting['about_us_description'],0, 900))
                                <p>{{ $frontSetting['about_us_description'] }}</p>
                            @else
                                <div id="descriptionSeeMore2">{!! substr(strip_tags($frontSetting['about_us_description']),0, 900) !!}
                                    ... <a class="see-more-btn login btn-sm" id="descriptionSeeMore">Read more</a></div>
                            @endif
                            <div id="descriptionSeeMore1" style="display: none">
                                {{ $frontSetting['about_us_description'] }}
                                <a class="see-more-btn login btn-sm" id="descriptionSeeMore3"> Less</a>
                            </div>
                        </div>
                    </div>
                    <div style="height: 50px; clear: both;">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <h2 class="mt0">Our Mission</h2>
                            @if($frontSetting['about_us_mission'] == substr($frontSetting['about_us_mission'],0, 900))
                                <p>{{ $frontSetting['about_us_mission'] }}</p>
                            @else
                                <div id="see_more2">{!! substr(strip_tags($frontSetting['about_us_mission']),0, 900) !!}
                                    ... <a class="see-more-btn login btn-sm" id="see_more">Read more</a></div>
                            @endif
                            <div id="see_more1" style="display: none">
                                {{ $frontSetting['about_us_mission'] }}
                                <a class="see-more-btn login btn-sm" id="see_more3"> Less</a>
                            </div>
                        </div>
                    </div>

                    <div style="height: 50px; clear: both;">&nbsp;</div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('page_scripts')
    <script>
        $('#see_more').click(function () {
            $('#see_more1').css({ 'display': 'block' });
            $('#see_more2').css({ 'display': 'none' });
        });
        $('#see_more3').click(function () {
            $('#see_more1').css({ 'display': 'none' });
            $('#see_more2').css({ 'display': 'block' });
        });

        $('#descriptionSeeMore').click(function () {
            $('#descriptionSeeMore1').css({ 'display': 'block' });
            $('#descriptionSeeMore2').css({ 'display': 'none' });
        });
        $('#descriptionSeeMore3').click(function () {
            $('#descriptionSeeMore1').css({ 'display': 'none' });
            $('#descriptionSeeMore2').css({ 'display': 'block' });
        });
    </script>
    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lightgallery/dist/js/lightgallery.js') }}"></script>
    <script src="{{ mix('assets/js/web/plugin.js') }}"></script>
@endsection
