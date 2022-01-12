<div class="alert alert-danger display-none" id="validationErrorsBox"></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('to', __('messages.email.to').':') }}<span class="required">*</span>
            {{ Form::email('to', null, ['class' => 'form-control','required', 'id' => 'emailId']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('subject', __('messages.email.subject').':') }}<span class="required">*</span>
            {{ Form::text('subject', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('message', __('messages.email.message').':') }}<span class="required">*</span>
            {{ Form::textarea('message', null, ['class' => 'form-control','rows' => 6,'required']) }}
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="row">
            <div class="col-sm-4 col-6">
                {{ Form::label('file', __('messages.email.attachment')) }}
                <label class="image__file-upload"> {{ __('messages.common.choose') }}
                    {{ Form::file('file',['id'=>'documentImage','class' => 'd-none document-file']) }}
                </label>
            </div>
            <div class="col-sm-4 col-6 mt-1">
                <img id='previewImage' class="img-thumbnail thumbnail-preview image-stretching"
                     src="{{ asset('assets/img/default_image.jpg') }}"/>
            </div>
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.sms.send'), ['class' => 'btn btn-primary']) }}
        <a href="{{ route('mail') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
