<div class="row view-spacer">
    <div class="form-group col-md-3">
        {{ Form::label('patient_id', __('messages.ambulance_call.patient').':', ['class' => 'font-weight-bold']) }}
        <p>{{ $ambulanceCall->patient->user->full_name }}</p>
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('ambulance_id', __('messages.ambulance_call.vehicle_model').':', ['class' => 'font-weight-bold']) }}
        <p>{{ $ambulanceCall->ambulance->vehicle_model }}</p>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('date', __('messages.ambulance_call.date').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($ambulanceCall->date)->format('jS M, Y') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('pay_to', __('messages.ambulance_call.driver_name').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $ambulanceCall->driver_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('amount', __('messages.ambulance_call.amount').(':'),['class'=>'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($ambulanceCall->amount,2) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($ambulanceCall->created_at)) }}">{{ $ambulanceCall->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($ambulanceCall->updated_at)) }}">{{ $ambulanceCall->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
