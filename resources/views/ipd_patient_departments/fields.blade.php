<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.ipd_patient.patient_id').':') }}<label class="required">*</label>
            {{ Form::select('patient_id',$data['patients'], null, ['class' => 'form-control','required','id' => 'patientId','placeholder'=>'Select Patient']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.ipd_patient.case_id').':') }}<label class="required">*</label>
            {{ Form::select('case_id', [null], null, ['class' => 'form-control','id' => 'caseId', 'disabled', 'required']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('ipd_number', __('messages.ipd_patient.ipd_number').':') }}
            {{ Form::text('ipd_number', $data['ipdNumber'], ['class' => 'form-control', 'readonly']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('height', __('messages.ipd_patient.height').':') }}
            {{ Form::number('height', 0, ['class' => 'form-control floatNumber', 'max' => '7', 'step' => '.01']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('weight', __('messages.ipd_patient.weight').':') }}
            {{ Form::number('weight', 0, ['class' => 'form-control floatNumber', 'data-mask'=>'##0,00', 'max' => '200', 'step' => '.01']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('bp', __('messages.ipd_patient.bp').':') }}
            {{ Form::text('bp', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('admission_date', __('messages.ipd_patient.admission_date').':') }}<label
                    class="required">*</label>
            {{ Form::text('admission_date', null, ['class' => 'form-control','id' => 'admissionDate','autocomplete' => 'off', 'required']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.ipd_patient.doctor_id').':') }}<label class="required">*</label>
            {{ Form::select('doctor_id',$data['doctors'], null, ['class' => 'form-control','id' => 'doctorId','placeholder'=>'Select Doctor', 'required']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('bed_type_id', __('messages.ipd_patient.bed_type_id').':') }}<label
                    class="required">*</label>
            {{ Form::select('bed_type_id',$data['bedTypes'], null, ['class' => 'form-control','id' => 'bedTypeId','placeholder'=>'Select Bed Type', 'required']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('bed_id', __('messages.ipd_patient.bed_id').':') }}<label class="required">*</label>
            {{ Form::select('bed_id',[null], null, ['class' => 'form-control','id' => 'bedId','disabled', 'required']) }}
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('is_old_patient', __('messages.ipd_patient.is_old_patient').':') }}<br>
            <label class="switch switch-label switch-outline-primary-alt swich-center">
                <input name="is_old_patient" class="switch-input is-active" type="checkbox" value="1">
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
            </label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('symptoms', __('messages.ipd_patient.symptoms').':') }}
            {{ Form::textarea('symptoms', null, ['class' => 'form-control', 'rows' => 4]) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('notes', __('messages.ipd_patient.notes').':') }}
            {{ Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 4]) }}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'btnSave']) }}
        <a href="{{ route('ipd.patient.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
