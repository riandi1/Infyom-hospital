<div class="row view-spacer">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.investigation_report.patient').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $investigationReport->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.investigation_report.doctor').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $investigationReport->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('date', __('messages.investigation_report.date').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($investigationReport->date)->format('jS M, Y g:i A') }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('title', __('messages.investigation_report.title').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $investigationReport->title }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.investigation_report.description').(':'), ['class' => 'font-weight-bold']) }}
            <p>{!! (!empty($investigationReport->description)) ? nl2br(e($investigationReport->description)) : __('messages.common.n/a')  !!} </p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('attachment', __('messages.document.attachment').':', ['class' => 'font-weight-bold']) }}
            <br>
            @if(!empty($investigationReport->attachment_url))
                <a href="{{$investigationReport->attachment_url}}" target="_blank">View</a>
            @else
                N/A
            @endif
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ ($investigationReport->status == 1) ? 'Solved' : 'Not Solved' }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($investigationReport->created_at)) }}">{{ $investigationReport->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($investigationReport->updated_at)) }}">{{ $investigationReport->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
