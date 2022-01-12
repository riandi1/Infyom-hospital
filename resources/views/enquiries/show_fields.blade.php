<div class="row view-spacer">
    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            {{ Form::label('full_name', __('messages.enquiry.name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $enquiry->full_name }}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            {{ Form::label('email', __('messages.enquiry.email').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $enquiry->email }}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            {{ Form::label('contact_no', __('messages.enquiry.contact').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $enquiry->contact_no }}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            {{ Form::label('type', __('messages.enquiry.type').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $enquiry->enquiry_type }}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            {{ Form::label('viewed_by', __('messages.enquiry.viewed_by').':', ['class' => 'font-weight-bold']) }}
            <p>{{ (isset($enquiry->viewed_by)) ? $enquiry->user->full_name : __('messages.enquiry.not_viewed') }}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($enquiry->status) ? __('messages.enquiry.read') : __('messages.enquiry.unread') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($enquiry->created_at)) }}">{{ $enquiry->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($enquiry->updated_at)) }}">{{ $enquiry->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('message', __('messages.enquiry.message').':', ['class' => 'font-weight-bold']) }}
            <p>{!! nl2br(e($enquiry->message)) !!}</p>
        </div>
    </div>
</div>
