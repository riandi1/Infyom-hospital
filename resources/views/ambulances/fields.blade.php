<div class="row">
    <!-- Vehicle Number Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('vehicle_number', __('messages.ambulance.vehicle_number').(':')) }}<span
                class="required">*</span>
        {{ Form::text('vehicle_number', null, ['class' => 'form-control','required']) }}
    </div>

    <!-- Vehicle Model Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('vehicle_model', __('messages.ambulance.vehicle_model').(':')) }}<span
                class="required">*</span>
        {{ Form::text('vehicle_model', null, ['class' => 'form-control','required']) }}
    </div>

    <!-- Year Made Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('year_made', __('messages.ambulance.year_made').(':')) }}<span class="required">*</span>
        {{ Form::text('year_made', null, ['class' => 'form-control','required','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
    </div>

    <!-- Driver Name Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('driver_name', __('messages.ambulance.driver_name').(':')) }}<span class="required">*</span>
        {{ Form::text('driver_name', null, ['class' => 'form-control','required']) }}
    </div>

    <!-- Driver Contact Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('driver_contact', __('messages.ambulance.driver_contact').(':')) }}<span
                class="required">*</span><br>
        {{ Form::tel('driver_contact', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','required']) }}
        {{ Form::hidden('prefix_code',null,['id'=>'prefix_code']) }}
        <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
        <span id="error-msg" class="hide"></span>
    </div>

    <!-- Driver License Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('driver_license', __('messages.ambulance.driver_license').(':')) }}<span
                class="required">*</span>
        {{ Form::text('driver_license', null, ['class' => 'form-control','required']) }}
    </div>

    <!-- Note Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('note', __('messages.ambulance.note').(':')) }}
        {{ Form::textarea('note', null, ['class' => 'form-control','rows'=>'2']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('vehicle_type', __('messages.ambulance.vehicle_type').(':')) }}<span class="required">*</span>
        {{ Form::select('vehicle_type', $type,null, ['id'=>'vehicleType','class' => 'form-control','required']) }}
    </div>
    <div class="col-md-3 mb-3">
        {{ Form::label('is_available',__('messages.common.is_available').(':')) }}<br>
        <label class="switch switch-label switch-outline-primary-alt swich-center">
            <input name="is_available" class="switch-input is-active" type="checkbox" value="1" checked>
            <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
        </label>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'btnSave']) }}
        <a href="{{ route('ambulances.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
