<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('account_id', __('messages.payment.account').(':')) }}<span class="required">*</span>
        {{ Form::select('account_id', $accounts, null, ['class' => 'form-control','required','id' => 'accountId','placeholder'=>'Select Account']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('payment_date', __('messages.payment.payment_date').(':')) }}<label class="required">*</label>
        {{ Form::text('payment_date', null, ['id'=>'paymentDate', 'class' => 'form-control', 'required','autocomplete' => 'off']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('pay_to', __('messages.payment.pay_to').(':')) }}<label class="required">*</label>
        {{ Form::text('pay_to', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('amount', __('messages.payment.amount').(':')) }}<label class="required">*</label>
        {{ Form::text('amount', null, ['class' => 'form-control price-input price', 'required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('description', __('messages.payment.description').(':')) }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
