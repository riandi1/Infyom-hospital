<div class="row view-spacer">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('patient_name', __('messages.case.patient').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $deathReport->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.death_report.case_id').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $deathReport->case_id  }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('doctor_name', __('messages.case.doctor').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $deathReport->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('date', __('messages.death_report.date').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($deathReport->date)->format('jS M, Y g:i A') }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.death_report.description').(':'),['class'=>'font-weight-bold']) }}
            <p>{!! !empty($deathReport->description)?nl2br(e($deathReport->description)):'N/A' !!}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ \Carbon\Carbon::parse($deathReport->created_at)->format('jS M, Y') }}">{{ \Carbon\Carbon::parse($deathReport->created_at)->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ \Carbon\Carbon::parse($deathReport->updated_at)->format('jS M, Y') }}">{{ \Carbon\Carbon::parse($deathReport->updated_at)->diffForHumans() }}</span>
        </div>
    </div>
</div>
