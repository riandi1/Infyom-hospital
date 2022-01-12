<div class="row">
    <!-- Patient Name Field -->
    @if(Auth::user()->hasRole('Patient'))
        <input type="hidden" name="patient_id" value="{{ Auth::user()->owner_id }}">
    @else
        <div class="form-group col-sm-6">
            {{ Form::label('patient_name', __('messages.case.patient').':') }}<label class="required">*</label>
            {{ Form::select('patient_id',$patients, null, ['class' => 'form-control','required','id' => 'patientId','placeholder'=>'Select Patient']) }}
        </div>
    @endif
<!-- Department Name Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('department_name', __('messages.appointment.doctor_department').':') }}<label
                class="required">*</label>
        {{ Form::select('department_id',$departments, null, ['class' => 'form-control','required','id' => 'departmentId','placeholder'=>'Select Department']) }}
    </div>
    <!-- Doctor Name Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('doctor_name', __('messages.case.doctor').':') }}<label class="required">*</label>
        {{ Form::select('doctor_id',(isset($doctors) ? $doctors : []), null, ['class' => 'form-control','required','id' => 'doctorId','placeholder'=>'Select Doctor']) }}
    </div>

    @if(!Auth::user()->hasRole('Patient'))
    <!-- Date Field -->
        <div class="form-group col-sm-6">
            {{ Form::label('opd_date', __('messages.appointment.date').':') }}<label class="required">*</label>
            {{ Form::text('opd_date', null, ['id'=>'opdDate', 'class' => 'form-control', 'required', 'autocomplete'=>'off']) }}
        </div>
        <!-- Notes Field -->
        <div class="form-group col-sm-6">
            {{ Form::label('problem', __('messages.appointment.description').':') }}
            {{ Form::textarea('problem', null, ['class' => 'form-control', 'rows'=>'4']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('status', __('messages.common.status').':') }}<br>
            <label class="switch switch-label switch-outline-primary-alt swich-center">
                <input name="status" class="switch-input is-active" type="checkbox"
                       value="1" {{ ($statusArr === \App\Models\Appointment::STATUS_COMPLETED) ? 'checked' : '' }}>
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
            </label>
        </div>
        <div align="left" class="form-group col-sm-6">
            <div class="doctor-schedule" style="display: none">
                <i class="fas fa-calendar-alt"></i>
                <span class="day-name"></span>
                <span class="schedule-time"></span>
            </div>
            <strong class="error-message" style="display: none"></strong>
            <div class="slot-heading">
                <strong class="available-slot-heading"
                        style="display: none">{{ __('messages.appointment.available_slot').':' }}</strong>
            </div>
            <div class="row">
                <div class="available-slot form-group col-sm-10">
                </div>
            </div>
            <div class="color-information" align="right" style="display: none">
                <span><i class="fa fa-circle fa-xs" aria-hidden="true"> </i> {{ __('messages.appointment.no_available') }}</span>
            </div>
        </div>
    @endif

    @if(Auth::user()->hasRole('Patient'))
    <!-- Date Field -->
        <div class="form-group col-sm-6">
            {{ Form::label('opd_date', __('messages.appointment.date').':') }}<label class="required">*</label>
            {{ Form::text('opd_date', null, ['id'=>'opdDate', 'class' => 'form-control', 'required', 'autocomplete'=>'off']) }}
        </div>

        <!-- Notes Field -->
        <div class="form-group col-sm-6">
            {{ Form::label('problem', __('messages.appointment.description').':') }}
            {{ Form::textarea('problem', null, ['class' => 'form-control', 'rows'=>'4']) }}
        </div>
        <div class="form-group col-sm-6 available-slot-div">
            <div class="doctor-schedule" style="display: none">
                <i class="fas fa-calendar-alt"></i>
                <span class="day-name"></span>
                <span class="schedule-time"></span>
            </div>
            <strong class="error-message" style="display: none"></strong>
            <div class="slot-heading">
                <strong class="available-slot-heading"
                        style="display: none">{{ __('messages.appointment.available_slot').':' }}</strong>
            </div>
            <div class="row">
                <div class="available-slot form-group col-sm-10">
                </div>
            </div>
            <div class="color-information" align="right" style="display: none">
                <span><i class="fa fa-circle fa-xs" aria-hidden="true"> </i> {{ __('messages.appointment.no_available') }}</span>
            </div>
        </div>
    @endif
</div>

<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary','id'=>'saveBtn']) }}
        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
