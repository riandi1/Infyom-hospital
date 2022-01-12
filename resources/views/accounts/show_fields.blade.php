<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', __('messages.account.account').':',['class'=>'font-weight-bold']) }}
            <p>{{ $account->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('type', __('messages.account.type').':',['class'=>'font-weight-bold']) }}
            <p>{{ ($account->type == 1) ? 'Debit' : 'Credit' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status',__('messages.common.status').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ ($account->status == 1) ? 'Active' : 'Deactive' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('description', __('messages.account.description').':',['class'=>'font-weight-bold']) }}
            <p>{{ ($account->description != '')? nl2br(e($account->description)):'N/A' }}</p>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.payment.payments') }}</h4>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive viewList">
            <table id="accountPayments" class="display table table-responsive-sm table-striped table-bordered">
                <thead>
                <tr>
                    <th class="w-10">{{ __('messages.payment.payment_date') }}</th>
                    <th class="w-50">{{ __('messages.payment.description') }}</th>
                    <th class="w-15">{{ __('messages.payment.pay_to') }}</th>
                    <th class="w-10 text-right">{{ __('messages.payment.amount') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ date('jS M, Y', strtotime($payment->payment_date)) }}</td>
                        <td class="text-truncate"
                            style="max-width: 150px">{!! !empty($payment->description)?nl2br(e($payment->description)):'N/A' !!}</td>
                        <td>{{ $payment->pay_to }}</td>
                        <td class="text-right"><b>{{getCurrencySymbol()}}</b> {{ number_format($payment->amount, 2) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
