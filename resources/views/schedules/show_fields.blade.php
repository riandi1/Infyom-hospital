<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_name', __('messages.case.doctor').':', ['class'=>'font-weight-bold']) }}
            <p>{{ $schedule->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('per_patient_time', __('messages.schedule.per_patient_time').':', ['class'=>'font-weight-bold']) }}
            <p>{{ date('H:i', strtotime($schedule->per_patient_time)) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($schedule->created_at)) }}">{{ $schedule->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($schedule->updated_at)) }}">{{ $schedule->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
<div class="com-sm-12">
    {{ Form::label('schedule', __('messages.schedule_label').':',['class'=>'font-weight-bold']) }}
    <table class="table table-bordered table-responsive-sm d-table-con">
        <thead class="table-dark">
        <th>{{ __('messages.schedule.available_on') }}</th>
        <th>{{ __('messages.schedule.available_from') }}</th>
        <th>{{ __('messages.schedule.available_to') }}</th>
        </thead>
        <tbody>
        @foreach($scheduleDays as $scheduleDay)
            <tr>
                <td>{{ $scheduleDay->available_on }}</td>
                <td>{{ date('H:i A', strtotime($scheduleDay->available_from)) }}</td>
                <td>{{ date('H:i A', strtotime($scheduleDay->available_to)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
