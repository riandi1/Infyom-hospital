<div class="row view-spacer">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('patient_name', __('messages.case.patient').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $birthReport->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.death_report.case_id').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $birthReport->case_id  }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('doctor_name', __('messages.case.doctor').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $birthReport->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('date', __('messages.death_report.date').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($birthReport->date)->format('jS M, Y g:i A') }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.death_report.description').(':'),['class'=>'font-weight-bold']) }}
            <p>{!! !empty($birthReport->description)?nl2br(e($birthReport->description)):'N/A' !!}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ \Carbon\Carbon::parse($birthReport->created_at)->format('jS M, Y') }}">{{ \Carbon\Carbon::parse($birthReport->created_at)->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ \Carbon\Carbon::parse($birthReport->updated_at)->format('jS M, Y') }}">{{ \Carbon\Carbon::parse($birthReport->updated_at)->diffForHumans() }}</span>
        </div>
    </div>
</div>

