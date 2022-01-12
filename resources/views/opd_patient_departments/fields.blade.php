{{ Form::hidden('revisit', (isset($data['last_visit'])) ? $data['last_visit']->id : null) }}
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.ipd_patient.patient_id').':') }}<label class="required">*</label>
            {{ Form::select('patient_id', $data['patients'] , (isset($data['last_visit'])) ? $data['last_visit']->patient_id : null, ['class' => 'form-control','required','id' => 'patientId','placeholder'=>'Select Patient']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.ipd_patient.case_id').':') }}<label class="required">*</label>
            {{ Form::select('case_id', [null], null, ['class' => 'form-control','id' => 'caseId','required', 'disabled']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('opd_number', __('messages.opd_patient.opd_number').':') }}
            {{ Form::text('opd_number', $data['opdNumber'], ['class' => 'form-control', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('height', __('messages.ipd_patient.height').':') }}
            {{ Form::number('height', (isset($data['last_visit'])) ? $data['last_visit']->height : 0, ['class' => 'form-control', 'max' => '7', 'step' => '.01']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('weight', __('messages.ipd_patient.weight').':') }}
            {{ Form::number('weight', (isset($data['last_visit'])) ? $data['last_visit']->weight : 0, ['class' => 'form-control', 'max' => '200', 'step' => '.01']) }}
        </div>
    </div>
    <div class="col-md-2 no-gutters">
        <div class="form-group">
            {{ Form::label('bp', __('messages.ipd_patient.bp').':') }}
            {{ Form::text('bp', (isset($data['last_visit'])) ? $data['last_visit']->weight : null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('appointment_date', __('messages.opd_patient.appointment_date').':') }}<label
                    class="required">*</label>
            {{ Form::text('appointment_date', null, ['class' => 'form-control','id' => 'appointmentDate','autocomplete' => 'off', 'required']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.ipd_patient.doctor_id').':') }}<label class="required">*</label>
            {{ Form::select('doctor_id',$data['doctors'], (isset($data['last_visit'])) ? $data['last_visit']->doctor_id : null, ['class' => 'form-control','id' => 'doctorId','placeholder'=>'Select Doctor', 'required']) }}
        </div>
    </div>
    <div class="col-md-3">
        {{ Form::label('standard_charge', __('messages.doctor_opd_charge.standard_charge').':') }}
        <label class="required">*</label>
        <div class="form-group input-group">

            <div class="input-group-prepend ">

                <div class="input-group-text"><i class="{{ getCurrenciesClass() }}"></i></div>
            </div>
            {{ Form::text('standard_charge', null , ['class' => 'form-control price-input','id'=>'standardCharge','required']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('payment_mode', __('messages.ipd_payments.payment_mode').':') }}<label
                    class="required">*</label>
            {{ Form::select('payment_mode',$data['paymentMode'], null, ['class' => 'form-control','id' => 'paymentMode','placeholder'=>'Select Payment', 'required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('symptoms', __('messages.ipd_patient.symptoms').':') }}
            {{ Form::textarea('symptoms', null, ['class' => 'form-control', 'rows' => 4]) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('notes', __('messages.ipd_patient.notes').':') }}
            {{ Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 4]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('is_old_patient', __('messages.ipd_patient.is_old_patient').':') }}<br>
            <label class="switch switch-label switch-outline-primary-alt swich-center">
                <input name="is_old_patient" class="switch-input is-active" type="checkbox" value="1">
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
            </label>
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'btnSave']) }}
        <a href="{{ route('opd.patient.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
