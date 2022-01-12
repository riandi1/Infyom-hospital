<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('patient_id', __('messages.ambulance_call.patient').(':')) }}<span class="required">*</span>
        {{ Form::select('patient_id', $patients, null, ['class' => 'form-control','required','id' => 'patientId','placeholder'=>'Select Patient']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('ambulance_id', __('messages.ambulance_call.vehicle_model').(':')) }}<span
                class="required">*</span>
        {{ Form::select('ambulance_id', $ambulances, null, ['class' => 'form-control','required','id' => 'ambulanceId','placeholder'=>'Select Ambulance']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('date', __('messages.ambulance_call.date').(':')) }}<label class="required">*</label>
        {{ Form::text('date', null, ['id'=>'date', 'class' => 'form-control', 'required','autocomplete' => 'off']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('driver_name', __('messages.ambulance_call.driver_name').(':')) }}<label
                class="required">*</label>
        {{ Form::text('driver_name', null, ['class' => 'form-control', 'required', 'readonly', 'id' => 'driverName']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('amount', __('messages.ambulance_call.amount').(':')) }}<label class="required">*</label>
        {{ Form::text('amount', null, ['class' => 'form-control price-input', 'required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'saveBtn']) }}
        <a href="{{ route('ambulance-calls.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
