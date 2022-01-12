<div class="row view-spacer">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('patient_name', __('messages.case.patient').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $operationReport->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.operation_report.case_id').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $operationReport->case_id }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.case.doctor').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $operationReport->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('date', __('messages.operation_report.date').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($operationReport->date)->format('jS M, Y g:i A') }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.operation_report.description').(':'), ['class' => 'font-weight-bold']) }}
            <p>{!! (($operationReport->description != "")) ? nl2br(e($operationReport->description)) : __('messages.common.n/a') !!}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($operationReport->created_at)) }}">{{ $operationReport->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($operationReport->updated_at)) }}">{{ $operationReport->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
