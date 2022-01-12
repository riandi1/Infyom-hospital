<div class="row view-spacer">
    <!-- Patient Name Field -->
    <div class="form-group col-md-4 col-lg-3">
        {{ Form::label('patient_name', __('messages.case.patient').':',['class'=>'font-weight-bold']) }}
        <p>{{ $appointment->patient->user->full_name }}</p>
    </div>

    <!-- Doctor Name Field -->
    <div class="form-group col-md-4 col-lg-3">
        {{ Form::label('doctor_name', __('messages.case.doctor').':',['class'=>'font-weight-bold']) }}
        <p>{{ $appointment->doctor->user->full_name }}</p>
    </div>

    <!-- Department Name Field -->
    <div class="form-group col-md-4 col-lg-3">
        {{ Form::label('department_name', __('messages.appointment.doctor_department').':',['class'=>'font-weight-bold']) }}
        <p>{{ $appointment->doctor->department->title  }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-md-4 col-lg-3">
        {{ Form::label('created_at', __('messages.common.created_on').':',['class'=>'font-weight-bold']) }}<br>
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($appointment->created_at)) }}">{{ $appointment->created_at->diffForHumans() }}</span>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-md-4 col-lg-3">
        {{ Form::label('updated_at', __('messages.common.last_updated').':',['class'=>'font-weight-bold']) }}<br>
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($appointment->updated_at)) }}">{{ $appointment->updated_at->diffForHumans() }}</span>
    </div>

    <!-- Appointment Date Field -->
    <div class="form-group col-md-4 col-lg-3">
        {{ Form::label('opd_date', __('messages.appointment.date').':',['class'=>'font-weight-bold']) }}
        <p>{{ isset($appointment->opd_date) ? \Carbon\Carbon::parse($appointment->opd_date)->format('jS M, Y g:i A') : __('messages.common.n/a') }}</p>
    </div>

    <!-- Notes Field -->
    <div class="form-group col-md-12 col-lg-6">
        {{ Form::label('problem', __('messages.appointment.description').':',['class'=>'font-weight-bold']) }}
        <p>{!! !empty($appointment->problem) ? nl2br(e($appointment->problem)) : __('messages.common.n/a')  !!}</p>
    </div>

    <!-- Status Field -->
    <div class="form-group col-md-12 col-lg-6">
        {{ Form::label('status', __('messages.common.status').':',['class' => 'font-weight-bold']) }}<br>
        <p>{{ ($appointment->is_completed === \App\Models\Appointment::STATUS_COMPLETED) ? __('messages.appointment.completed') : __('messages.appointment.pending') }}</p>
    </div>
</div>
