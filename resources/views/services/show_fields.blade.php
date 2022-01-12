<div class="row view-spacer">
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('name', __('messages.package.service').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $service->name }}</p>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('quantity', __('messages.service.quantity').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $service->quantity }}</p>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('rate', __('messages.service.rate').':', ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($service->rate,2) }}</p>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($service->status == 1) ? __('messages.common.active') : __('messages.common.de_active') }}</p>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($service->created_at)) }}">{{ $service->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($service->updated_at)) }}">{{ $service->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            {{ Form::label('description', __('messages.common.description').':', ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($service->description)?nl2br(e($service->description)):__('messages.common.n/a') !!}</p>
        </div>
    </div>
</div>
