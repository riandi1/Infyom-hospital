<div class="row">
    <div class="form-group col-sm-3">
        {{ Form::label('patient_id', __('messages.prescription.patient').':') }}<label class="required">*</label>
        {{ Form::select('patient_id',$patients, null, ['class' => 'form-control','required','id' => 'patient_id','placeholder'=>'Select Patient']) }}
    </div>
    @if(Auth::user()->hasRole('Doctor'))
        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
    @else
        <div class="form-group col-sm-3">
            {{ Form::label('doctor_name', __('messages.case.doctor').(':')) }}<label
                    class="required">*</label>
            {{ Form::select('doctor_id',$doctors, null, ['class' => 'form-control','required','id' => 'doctorId','placeholder'=>'Select Doctor']) }}
        </div>
    @endif
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('food_allergies', __('messages.prescription.food_allergies').':') }}
            {{ Form::text('food_allergies', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('tendency_bleed', __('messages.prescription.tendency_bleed').':') }}
            {{ Form::text('tendency_bleed', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('heart_disease', __('messages.prescription.heart_disease').':') }}
            {{ Form::text('heart_disease', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('high_blood_pressure', __('messages.prescription.high_blood_pressure').':') }}
            {{ Form::text('high_blood_pressure', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('diabetic', __('messages.prescription.diabetic').':') }}
            {{ Form::text('diabetic', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('surgery', __('messages.prescription.surgery').':') }}
            {{ Form::text('surgery', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('accident', __('messages.prescription.accident').':') }}
            {{ Form::text('accident', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('others', __('messages.prescription.others').':') }}
            {{ Form::text('others', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('medical_history', __('messages.prescription.medical_history').':') }}
            {{ Form::text('medical_history', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('current_medication', __('messages.prescription.current_medication').':') }}
            {{ Form::text('current_medication', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('female_pregnancy', __('messages.prescription.female_pregnancy').':') }}
            {{ Form::text('female_pregnancy', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('breast_feeding', __('messages.prescription.breast_feeding').':') }}
            {{ Form::text('breast_feeding', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('health_insurance', __('messages.prescription.health_insurance').':') }}
            {{ Form::text('health_insurance', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('low_income', __('messages.prescription.low_income').':') }}
            {{ Form::text('low_income', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('reference', __('messages.prescription.reference').':') }}
            {{ Form::text('reference', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':') }}<br>
            <label class="switch switch-label switch-outline-primary-alt swich-center">
                <input name="status" class="switch-input is-active" type="checkbox"
                       value="1" {{(isset($prescription) && ($prescription->status)) ? 'checked' : ''}}>
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
            </label>
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'saveBtn']) }}
        <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
