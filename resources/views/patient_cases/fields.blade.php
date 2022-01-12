<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('patient_name', __('messages.case.patient').':') }}<label class="required">*</label>
        {{ Form::select('patient_id',$patients, null, ['class' => 'form-control','required','id' => 'patientId','placeholder'=>'Select Patient']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('doctor_name', __('messages.case.doctor').':') }}<label class="required">*</label>
        {{ Form::select('doctor_id',$doctors, null, ['class' => 'form-control','required','id' => 'doctorId','placeholder'=>'Select Doctor']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('date', __('messages.case.case_date').':') }}<label class="required">*</label>
        {{ Form::text('date', null, ['id'=>'date', 'class' => 'form-control', 'required','autocomplete' => 'off']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('phone', __('messages.case.phone').':') }}<br>
        {{ Form::tel('phone', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
        {{ Form::hidden('prefix_code',null,['id'=>'prefix_code']) }}
        <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
        <span id="error-msg" class="hide"></span>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('status', __('messages.common.status').':') }}<br>
        <label class="switch switch-label switch-outline-primary-alt swich-center">
            <input name="status" class="switch-input is-active" type="checkbox"
                   value="1" {{(!isset($patientCase))? 'checked': (($patientCase->status) ? 'checked' : '')}}>
            <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
        </label>
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('fee', __('messages.case.fee').':') }}<label class="required">*</label>
        {{ Form::text('fee', null, ['class' => 'form-control price-input', 'required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('description', __('messages.common.description').':') }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'saveBtn']) }}
        <a href="{{ route('patient-cases.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
