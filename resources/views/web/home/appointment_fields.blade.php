<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('gender', __('messages.patient_appointment').(':'),['class'=>'font-weight-bold']) }}
        <br>
        <input type="radio" class="new-patient-radio" name="patient_type"
               value="1" checked>&nbsp;{{ __('messages.new_patient') }} &nbsp;&nbsp;&nbsp;
        <input type="radio" class="old-patient-radio" name="patient_type"
               value="2"> {{ __('messages.old_patient') }}
    </div>
    <div class="form-group col-sm-6 patient-email-div">
        {{ Form::label('email', __('messages.user.email').(':'),['class'=>'font-weight-bold']) }}<span
                class="text text-danger">*</span>
        {{ Form::email('email', null, ['class' => 'form-control old-patient-email','autocomplete' => 'off','required']) }}
    </div>
    <div class="form-group col-sm-6 old-patient d-none">
        {{ Form::label('patient_id', __('messages.appointment.patient_name').(':'),['class'=>'font-weight-bold']) }}
        <span class="text text-danger">*</span>
        {{ Form::text('patient_name', null, ['class' => 'form-control', 'id' => 'patientName', 'autocomplete' => 'off', 'required', 'readonly']) }}
        {{ Form::hidden('patient_id',null,['id'=>'patient']) }}
    </div>
    <div class="form-group col-sm-3 first-name-div">
        {{ Form::label('first_name', __('messages.user.first_name').(':'),['class'=>'font-weight-bold']) }}<span
                class="text text-danger">*</span>
        {{ Form::text('first_name', null, ['class' => 'form-control','autocomplete' => 'off','required','id'=>'firstName']) }}
    </div>
    <div class="form-group col-sm-3 last-name-div">
        {{ Form::label('last_name', __('messages.user.last_name').(':'),['class'=>'font-weight-bold']) }}<span
                class="text text-danger">*</span>
        {{ Form::text('last_name', null, ['class' => 'form-control','autocomplete' => 'off','required','id'=>'lastName']) }}
    </div>
    <div class="form-group col-md-6 gender-div">
        {{ Form::label('gender', __('messages.user.gender').':', ['class'=>'font-weight-bold']) }}<span
                class="text text-danger">*</span> &nbsp;<br>
        {{ Form::radio('gender', '0', true) }} {{ __('messages.user.male') }} &nbsp;
        {{ Form::radio('gender', '1') }} {{ __('messages.user.female') }}
    </div>
    <div class="form-group col-md-3 password-div">
        {{ Form::label('password', __('messages.user.password').':', ['class'=>'font-weight-bold']) }}<span
                class="text text-danger">*</span>
        {{ Form::password('password', ['class' => 'form-control','required','min' => '6','max' => '10','id'=>'password']) }}
    </div>
    <div class="form-group col-md-3 confirm-password-div">
        {{ Form::label('password_confirmation', __('messages.user.password_confirmation').':', ['class'=>'font-weight-bold']) }}
        <span
                class="text text-danger">*</span>
        {{ Form::password('password_confirmation', ['class' => 'form-control','required','min' => '6','max' => '10','id'=>'confirmPassword']) }}
    </div>


    <div class="form-group col-sm-6">
        {{ Form::label('department_id', __('messages.appointment.doctor_department').(':'),['class'=>'font-weight-bold']) }}
        <span class="text text-danger">*</span>
        {{ Form::select('department_id',$departments, null, ['class' => 'form-control', 'id' => 'departmentId', 'placeholder'=>'Select Department','required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('doctor_id', __('messages.appointment.doctor').(':'),['class'=>'font-weight-bold']) }}<span
                class="text text-danger">*</span>
        {{ Form::select('doctor_id',[], null, ['class' => 'form-control','autocomplete' => 'off', 'id' => 'doctorId', 'placeholder'=>'Select Doctor','required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('opd_date', __('messages.investigation_report.date').(':'),['class'=>'font-weight-bold']) }}<span
                class="text text-danger">*</span>
        {{ Form::text('opd_date', null, ['class' => 'form-control','autocomplete' => 'off','id' => 'opdDate','required']) }}
    </div>
    <div class="form-group col-sm-12">
        {{ Form::label('problem', __('messages.appointment.description').(':'),['class'=>'font-weight-bold']) }}
        {{ Form::textarea('problem', null, ['class' => 'form-control','autocomplete' => 'off', 'rows' => 3]) }}
    </div>
    <div align="left" class="form-group col-sm-12">
        <div class="doctor-schedule" style="display: none">
            <i class="fas fa-calendar-alt"></i>
            <span class="day-name"></span>
            <span class="schedule-time"></span>
        </div>
        <strong class="error-message" style="display: none"></strong>
        <div class="slot-heading">
            <strong class="available-slot-heading" style="display: none">{{ __('messages.bed.available') }}:</strong>
        </div>
        <div class="row">
            <div class="available-slot form-group col-sm-10">
            </div>
        </div>
        <div class="color-information" align="right" style="display: none">
            <span><i class="fa fa-circle fa-xs" aria-hidden="true"> </i> {{ __('messages.bed.not_available') }}</span>
        </div>
    </div>
    <div class="form-group col-sm-6 pl-3">
        {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary btn-flat send-enquiry-btn','id' => 'btnSave']) !!}
    </div>
</div>
