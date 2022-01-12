<div class="row">
    <!-- Patient Id Field -->
    <div class="form-group col-sm-6 col-md-4 col-lg-3">
        {{ Form::label('patient_id', __('messages.invoice.patient').(':')) }}<span class="required">*</span>
        {{ Form::select('patient_id', $patients, isset($invoice) ? $invoice->patient_id : null, ['class' => 'form-control', 'id' => 'patient_id', 'placeholder' => 'Select Patient']) }}
    </div>

    <!-- Bill Date Field -->
    <div class="form-group col-sm-6 col-md-4 col-lg-3">
        {{ Form::label('invoice_date', __('messages.invoice.invoice_date').(':')) }}<span class="required">*</span>
        {{ Form::text('invoice_date', null, ['class' => 'form-control', 'id' => 'invoice_date', 'autocomplete' => 'off']) }}
    </div>

    <!-- discount Field -->
    <div class="form-group col-sm-6 col-md-4 col-lg-3">
        {{ Form::label('discount', __('messages.invoice.discount').(':')) }}<span class="required">*</span> (%)
        {{ Form::text('discount', isset($invoice) ? $invoice->discount : null, ['class' => 'form-control', 'id' => 'discount', 'onkeypress' => 'return isNumberKey(event, this)', 'required', 'placeholder' => 'In percentage']) }}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-6 col-md-4 col-lg-3">
        {{ Form::label('status', __('messages.common.status').(':')) }}<span class="required">*</span>
        {{ Form::select('status', $statusArr, isset($invoice) ? $invoice->status : null, ['class' => 'form-control', 'id' => 'status']) }}
    </div>
</div>

<div class="row">
    <div class="col-sm-12 overflow-auto table-responsive-sm">
        <table class="table table-bordered min-w-800" id="billTbl">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th>{{ __('messages.account.account') }}<span class="required">*</span></th>
                <th>{{ __('messages.invoice.description') }}</th>
                <th>{{ __('messages.invoice.qty') }}<span class="required">*</span></th>
                <th>{{ __('messages.invoice.price') }}<span class="required">*</span></th>
                <th class="text-right">{{ __('messages.invoice.amount') }}</th>
                <th class="table__add-btn-heading text-center">
                    <button type="button" class="btn btn-sm btn-primary w-100"
                            id="addItem">{{ __('messages.invoice.add') }}</button>
                </th>
            </tr>
            </thead>
            <tbody class="invoice-item-container">
            @if(isset($invoice))
                @foreach($invoice->invoiceItems as $invoiceItem)
                    <tr>
                        <td class="text-center item-number">1</td>
                        <td class="table__item-desc">
                            {{ Form::select('account_id[]', $accounts, $invoiceItem->account_id, ['class' => 'form-control accountId','required','placeholder'=>'Select Account']) }}
                            {{ Form::hidden('id[]', $invoiceItem->id) }}
                        </td>
                        <td>
                            {{ Form::text('description[]', $invoiceItem->description, ['class' => 'form-control']) }}
                        </td>
                        <td class="table__qty">
                            {{ Form::number('quantity[]', $invoiceItem->quantity, ['class' => 'form-control qty','required', 'type' => 'number', "min" => 1]) }}
                        </td>
                        <td>
                            {{ Form::text('price[]', number_format($invoiceItem->price), ['class' => 'form-control price-input price','required']) }}
                        </td>
                        <td class="amount text-right item-total">
                            {{ number_format($invoiceItem->total) }}
                        </td>
                        <td class="text-center">
                            <i class="fa fa-trash text-danger delete-invoice-item pointer"></i>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center item-number">1</td>
                    <td class="table__item-desc">
                        {{ Form::select('account_id[]', $accounts, null, ['class' => 'form-control accountId','required','placeholder'=>'Select Account']) }}
                    </td>
                    <td>
                        {{ Form::text('description[]', null, ['class' => 'form-control']) }}
                    </td>
                    <td class="table__qty">
                        {{ Form::number('quantity[]', null, ['class' => 'form-control qty','required', 'type' => 'number', "min" => 1]) }}
                    </td>
                    <td>
                        {{ Form::text('price[]', null, ['class' => 'form-control price-input price','required']) }}
                    </td>
                    <td class="amount text-right item-total">
                    </td>
                    <td class="text-center">
                        <i class="fa fa-trash text-danger delete-invoice-item pointer"></i>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 float-right p-0">
        <table class="float-right mr-3">
            <tbody class="bill-item-footer">
            <tr>
                <td class="font-weight-bold">{{ __('messages.invoice.sub_total').(':') }}</td>
                <td class="font-weight-bold text-right">
                    <span>{{ getCurrencySymbol() }}</span> <span id="total" class="price">
                        {{ isset($invoice) ? number_format($invoice->amount,2) : 0 }}
                    </span>
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">{{ __('messages.invoice.discount').(':') }}</td>
                <td class="font-weight-bold text-right">
                    <span>{{ getCurrencySymbol() }}</span> <span id="discountAmount">
                        {{ isset($invoice) ? number_format($invoice->amount * $invoice->discount / 100,2) : 0 }}
                    </span>
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">{{ __('messages.invoice.total').(':') }}</td>
                <td class="font-weight-bold text-right">
                    <span>{{ getCurrencySymbol() }}</span> <span id="finalAmount">
                        {{ isset($invoice) ? number_format($invoice->amount - ($invoice->amount * $invoice->discount / 100),2) : 0 }}
                    </span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Total Amount Field -->
{{ Form::hidden('amount', isset($invoice) ? number_format($invoice->amount - ($invoice->amount * $invoice->discount / 100),2) : 0, ['class' => 'form-control', 'id' => 'total_amount']) }}

<!-- Submit Field -->
<div class="form-group col-sm-12 form-buttons">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
