<div class="alert alert-danger display-none" id="customValidationErrorsBox"></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('first_name',__('messages.user.first_name').(':')) }}<span class="required">*</span>
            {{ Form::text('first_name', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('last_name',__('messages.user.last_name').(':')) }}<span class="required">*</span>
            {{ Form::text('last_name', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('email',__('messages.user.email').(':')) }}<span class="required">*</span>
            {{ Form::email('email', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('phone',__('messages.user.phone').(':')) }}<br>
            {{ Form::tel('phone', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
            {{ Form::hidden('prefix_code',null,['id'=>'prefix_code']) }}
            <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
            <span id="error-msg" class="hide"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('dob',__('messages.user.blood_group').(':')) }}
            {{ Form::select('blood_group', $bloodGroup, null, ['class' => 'form-control', 'id' => 'bloodGroup','placeholder'=>'Select Blood Group']) }}
        </div>
    </div>
    <div class="col-md-6">
        {{ Form::label('designation', __('messages.user.designation').':') }}<span class="required">*</span>
        {{ Form::text('designation', null, ['class' => 'form-control','required']) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('qualification', __('messages.user.qualification').':') }}<span class="required">*</span>
        {{ Form::text('qualification', null, ['class' => 'form-control','required']) }}
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('dob', __('messages.user.dob').':') }}
            {{ Form::text('dob', null, ['class' => 'form-control','id' => 'birthDate','autocomplete' => 'off']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('gender',__('messages.user.gender').(':')) }}<span class="required">*</span> &nbsp;<br>
            {{ Form::radio('gender', '0', true) }} Male &nbsp;
            {{ Form::radio('gender', '1') }} Female
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('status',__('messages.common.status').(':')) }}<br>
            <label class="switch switch-label switch-outline-primary-alt swich-center">
                <input name="status" class="switch-input is-active" type="checkbox"
                       value="1" {{(isset($user) && ($user->status)) ? 'checked' : ''}}>
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
            </label>
        </div>
    </div>
    <div class="form-group col-sm-6 col-md-4">
        <div class="row">
            <div class="col-4">{{ Form::label('image',__('messages.common.profile').(':')) }}
                <label class="image__file-upload" tabindex="9"> {{ __('messages.common.choose') }}
                    {{ Form::file('image',['id'=>'profileImage','class' => 'd-none']) }}
                </label></div>
            <div class="col-6">
                <div class="col-sm-4 preview-image-video-container pl-0 mt-1">
                    <img id='previewImage' class="img-thumbnail thumbnail-preview"
                         src="{{ isset($user->media[0]) ? $user->image_url : asset('assets/img/avatar.png')}}"/>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row mt-3">
    <div class="col-md-12 mb-3">
        <h5>{{__('messages.user.address_details')}}</h5>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('address1',__('messages.user.address1').(':')) }}
            {{ Form::text('address1', isset($accountant->address->address1) ? $accountant->address->address1 : null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('address2',__('messages.user.address2').(':')) }}
            {{ Form::text('address2', isset($accountant->address->address2) ? $accountant->address->address2 : null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('city',__('messages.user.city').(':')) }}
            {{ Form::text('city', isset($accountant->address->city) ? $accountant->address->city : null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('zip',__('messages.user.zip').(':')) }}
            {{ Form::text('zip', isset($accountant->address->zip) ? $accountant->address->zip : null, ['class' => 'form-control','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '6','minlength' => '6']) }}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
        <a href="{{ route('accountants.index') }}" class="btn btn-secondary">{{__('messages.common.cancel')}}</a>
    </div>
</div>
