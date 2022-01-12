<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('title', __('messages.document.title').':', ['class' => 'font-weight-bold']) }}
            <p>{{$documents->title}}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('document_type', __('messages.document.document_type').':', ['class' => 'font-weight-bold']) }}
            <p>{{$documents->documentType->name}}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient', __('messages.document.patient').':', ['class' => 'font-weight-bold']) }}
            <p>{{$documents->patient->user->full_name}}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('attachment', __('messages.document.attachment').':', ['class' => 'font-weight-bold']) }}
            <br>
            @if(!empty($documents->document_url))
                <a href="{{$documents->document_url}}" target="_blank">View</a>
            @else
                N/A
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('notes', __('messages.document.notes').':', ['class' => 'font-weight-bold']) }}
            <p> {!! !empty($documents->notes)? nl2br(e($documents->notes)):'N/A' !!}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($documents->created_at)) }}">{{ $documents->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':',['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($documents->updated_at)) }}">{{ $documents->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
