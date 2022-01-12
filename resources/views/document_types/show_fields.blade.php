<div class="row view-spacer">
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {{ Form::label('title', __('messages.document.document_type').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $documentType->name }}</p>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($documentType->created_at)) }}">{{ $documentType->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($documentType->updated_at)) }}">{{ $documentType->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.document.documents') }}</h4>
    </div>
    <div class="col-lg-12">
        <div class="viewList">
            <table id="userDocuments" class="display table table-responsive-sm table-bordered d-table-con">
                <thead>
                <tr>
                    <th>{{ __('messages.document.attachment') }}</th>
                    <th>{{ __('messages.document.title') }}</th>
                    <th>{{ __('messages.document.patient') }}</th>
                    <th>{{ __('messages.document.uploaded_by') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td><a href="{{ url('document-download'.'/'.$document->id) }}">Download</a></td>
                        <td>{{ $document->title }}</td>
                        <td>{{ $document->patient->user->full_name }}</td>
                        <td>{{ $document->user->full_name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
