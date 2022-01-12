<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('account_id', __('messages.account.account').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $payment->account->name  }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('payment_date', __('messages.payment.payment_date').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($payment->payment_date)->format('jS M, Y') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('pay_to', __('messages.payment.pay_to').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $payment->pay_to }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('amount', __('messages.payment.amount').(':'),['class'=>'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($payment->amount,2) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('description', __('messages.payment.description').(':'),['class'=>'font-weight-bold']) }}
            <p>
                {!! ($payment->description != '')?nl2br(e($payment->description)):'N/A' !!}
            </p>

        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($payment->created_at)) }}">{{ $payment->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($payment->updated_at)) }}">{{ $payment->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
