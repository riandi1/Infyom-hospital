<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.case.patient').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $advancedPayment->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('receipt_no', __('messages.advanced_payment.receipt_no').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $advancedPayment->receipt_no }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('amount', __('messages.advanced_payment.amount').(':'), ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($advancedPayment->amount, 2) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('date', __('messages.advanced_payment.date').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($advancedPayment->date)->format('jS M, Y') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($advancedPayment->created_at)) }}">{{ $advancedPayment->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($advancedPayment->updated_at)) }}">{{ $advancedPayment->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
