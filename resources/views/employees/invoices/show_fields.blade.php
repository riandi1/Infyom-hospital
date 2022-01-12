<div class="row">
    <!-- Patient Id Field -->
    <div class="form-group col-sm-6">
        {{ Form::label('patient_name', __('messages.invoice.patient').(':'), ['class' => 'mb-0','class' => 'font-weight-bold']) }}
        <br><a href="{{ route('patients.show', ['patient' => $invoice->patient->id]) }}">{{ $invoice->patient->user->full_name }}</a>
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('invoice_id', __('messages.invoice.invoice_id').(':'), ['class' => 'mb-0','class' => 'font-weight-bold']) }}
        <br><span>{{ $invoice->invoice_id }}</span>
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'mb-0','class' => 'font-weight-bold']) }}
        <p>{{ $invoice->status_label }}</p>
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('invoice_date', __('messages.invoice.invoice_date').(':'), ['class' => 'mb-0','class' => 'font-weight-bold']) }}
        <br>
        {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('jS M, Y') }}
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('address', __('messages.common.address').(':'), ['class' => 'mb-0','class' => 'font-weight-bold']) }}
        <br>
        @if(isset($invoice->patient->address) && !empty($invoice->patient->address))
            {{ $invoice->patient->address->address1 .' '. $invoice->patient->address->address2 .' ' . $invoice->patient->address->city .' '. $invoice->patient->address->zip }}
        @else
            {{ "N/A" }}
        @endif
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('hospitalAddress',  __('messages.invoice.hospital_address').(':'), ['class' => 'mb-0', 'class' => 'font-weight-bold']) }}
        <p>{{ $hospitalAddress }}</p>
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }} <br>
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($invoice->created_at)) }}">{{ $invoice->created_at->diffForHumans() }}</span>
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
        <br>
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($invoice->updated_at)) }}">{{ $invoice->updated_at->diffForHumans() }}</span>
    </div>

</div>

<div class="col-sm-12 ">
    <div class="table-responsive-sm">
        <table class="table table-bordered min-w-800">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th>{{ __('messages.account.account') }}</th>
                <th>{{ __('messages.invoice.description') }}</th>
                <th class="text-right">{{ __('messages.invoice.qty') }}</th>
                <th class="text-right">{{ __('messages.invoice.price') }}</th>
                <th class="text-right">{{ __('messages.invoice.amount') }}</th>
            </tr>
            </thead>
            <tbody class="invoice-item-container">
            @foreach($invoice->invoiceItems as $index => $invoiceItem)
                <tr>
                    <td class="text-center w-5">{{ $index + 1 }}</td>
                    <td>
                        {{ $invoiceItem->account->name }}
                    </td>
                    <td>
                        {!! ($invoiceItem->description != '')?nl2br(e($invoiceItem->description)):'N/A' !!}
                    </td>
                    <td class="table__qty text-right">
                        {{ $invoiceItem->quantity }}
                    </td>
                    <td class="text-right">
                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($invoiceItem->price) }}
                    </td>
                    <td class="text-right"><b>{{ getCurrencySymbol() }}</b> {{ number_format($invoiceItem->total) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-12 text-right p-0 font-weight-bold">
        {{ Form::label('discount', __('messages.invoice.sub_total').(':')) }}
        <b>{{ getCurrencySymbol() }}</b>
        {{ number_format($invoice->amount,2) }}
    </div>
    <div class="col-sm-12 text-right p-0 font-weight-bold">
        {{ Form::label('discount', __('messages.invoice.discount').(':')) }}
        <b>{{ getCurrencySymbol() }}</b>
        {{ number_format(($invoice->amount * $invoice->discount / 100),2) }}
    </div>
    <div class="col-sm-12 text-right p-0 font-weight-bold">
        {{ Form::label('total', __('messages.invoice.total').(':')) }}
        <b>{{ getCurrencySymbol() }}</b>
        {{ number_format($invoice->amount - ($invoice->amount * $invoice->discount / 100),2) }}
    </div>
</div>
