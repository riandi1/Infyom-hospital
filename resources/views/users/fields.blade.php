<div class="alert alert-danger display-none" id="userValidationErrorsBox"></div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('first_name',__('messages.user.first_name').':') }}<span
                class="text-danger">*</span>
        {{ Form::text('first_name', null, ['class' => 'form-control','required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('last_name',__('messages.user.last_name').':') }}<span
                class="text-danger">*</span>
        {{ Form::text('last_name', null, ['class' => 'form-control','required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('email',__('messages.user.email').':') }}<span
                class="text-danger">*</span>
        {{ Form::text('email', null, ['class' => 'form-control','required']) }}
    </div>
    @if(!$isEdit)
        <div class="form-group col-sm-6">
            {{ Form::label('department_id',__('messages.employee_payroll.role').':') }}<span
                    class="text-danger">*</span>
            {{ Form::select('department_id', $role, null, ['class' => 'form-control', 'required', 'id' => 'role','placeholder' => 'Select Role']) }}
        </div>
    @endif
    <div class="form-group col-sm-6 myclass">
        {{ Form::label('Phone',__('messages.visitor.phone').':') }}
        {!! Form::tel('phone', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
        {!! Form::hidden('prefix_code',null,['id'=>'prefix_code']) !!}
        <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
        <span id="error-msg" class="hide"></span>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('gender', __('messages.user.gender').':') }}<span class="required">*</span> &nbsp;<br>
            {{ Form::radio('gender', '0', true) }} {{ __('messages.user.male') }} &nbsp;
            {{ Form::radio('gender', '1') }} {{ __('messages.user.female') }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('dob', __('messages.user.dob').':') }}
            {{ Form::text('dob', null, ['class' => 'form-control','id' => 'birthDate','autocomplete' => 'off']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':') }}<br>
            <label class="switch switch-label switch-outline-primary-alt swich-center">
                <input name="status" class="switch-input is-active" type="checkbox" value="1" @if($isEdit)
                    {{(isset($user) && ($user->status)) ? 'checked' : ''}}
                @else
                    {{ 'checked' }}
                @endif">
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
            </label>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="row">
            <div class="col-4">
                {{ Form::label('image', __('messages.common.profile').':') }}
                <label class="image__file-upload" tabindex="11"> {{ __('messages.nurse.choose') }}
                    {{ Form::file('image',['id'=>'profileImage','class' => 'd-none']) }}
                </label>
            </div>
            <div class="col-6">
                <div class="col-sm-4 preview-image-video-container pl-0 mt-1">
                    <img id='previewImage' class="img-thumbnail thumbnail-preview image-stretching"
                         src="@if($isEdit)
                         {{ isset($user->media[0]) ? $user->image_url : asset('assets/img/avatar.png') }}
                         @else
                         {{ asset('assets/img/avatar.png') }}
                         @endif"/>
                </div>
            </div>
        </div>
    </div>
    @if(!$isEdit)
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('password', __('messages.user.password').':') }}<span class="required">*</span>
                {{ Form::password('password', ['class' => 'form-control','required','min' => '6','max' => '10']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('password_confirmation', __('messages.user.password_confirmation').':') }}<span
                        class="required">*</span>
                {{ Form::password('password_confirmation', ['class' => 'form-control','required','min' => '6','max' => '10']) }}
            </div>
        </div>
    @endif
</div>
<div class="form-group col-sm-12 pl-0">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary','id' => 'btnSave']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a>
</div>
