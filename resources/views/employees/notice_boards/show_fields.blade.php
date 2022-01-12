<div class="row view-spacer">
    <div class="col-md-3 form-group">
        {{ Form::label('title', __('messages.notice_board.title').':', ['class' => 'font-weight-bold']) }}
        <p>{{ $noticeBoard->title }}</p>
    </div>
    <div class="col-md-2 form-group">
        {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($noticeBoard->created_at)) }}">{{ $noticeBoard->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-2 form-group">
        {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}<br>
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($noticeBoard->updated_at)) }}">{{ $noticeBoard->updated_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-12 form-group">
        {{ Form::label('description', __('messages.notice_board.description').':', ['class' => 'font-weight-bold']) }}
        <p>{!! !empty($noticeBoard->description)? nl2br(e($noticeBoard->description)):'N/A' !!}</p>
    </div>
</div>
