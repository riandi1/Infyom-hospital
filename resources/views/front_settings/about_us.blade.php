@extends('front_settings.index')
@section('title')
    {{ __('messages.front_settings') }}
@endsection
@section('section')
    <div class="card border-0">
        <div class="card-body">
            {{ Form::open(['route' => ['front.settings.update'], 'method' => 'post', 'files' => true, 'id' => 'createFrontSetting']) }}
            <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
            <div class="row">
                <!-- About Us title Field -->
                <div class="form-group col-sm-12">
                    {{ Form::label('about_us_title', __('messages.front_setting.about_us_title').':') }}<span
                            class="required">*</span>
                    {{ Form::text('about_us_title', $frontSettings['about_us_title'], ['class' => 'form-control', 'required']) }}
                </div>
                <!-- About Us description Field -->
                <div class="form-group col-sm-12">
                    {{ Form::label('about_us_description', __('messages.front_setting.about_us_description').':') }}
                    <span class="required">*</span>
                    {{ Form::textarea('about_us_description', $frontSettings['about_us_description'], ['class' => 'form-control', 'required', 'rows' => 5]) }}
                </div>
                <!-- About Us mission Field -->
                <div class="form-group col-sm-12">
                    {{ Form::label('about_us_mission', __('messages.front_setting.about_us_mission').':') }}<span
                            class="required">*</span>
                    {{ Form::textarea('about_us_mission', $frontSettings['about_us_mission'], ['class' => 'form-control', 'required', 'rows' => 5]) }}
                </div>
                <!-- About US Image Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        <div class="col-md-4 col-sm-3 col-6">
                            {{ Form::label('about_us_image', __('messages.front_setting.about_us_image').':') }}<span
                                    class="required">*</span>
                            <label class="image__file-upload"> {{ __('messages.nurse.choose') }}
                                {{ Form::file('about_us_image',['id'=>'aboutUsImage','class' => 'd-none']) }}
                            </label>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 preview-image-video-container pl-0 mt-1">
                            <img id='previewImage'
                                 class="img-thumbnail thumbnail-preview settingThumbnailPreview image-stretching"
                                 src="{{($frontSettings['about_us_image']) ? $frontSettings['about_us_image'] : asset('assets/img/default_image.jpg')}}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
                    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
