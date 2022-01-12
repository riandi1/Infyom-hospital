<div class="row">
    <div class="col-md-6">
        <h5>{{ __('messages.ipd_charges') }}</h5>
        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">{{ __('messages.account.type') }}</th>
                    <th scope="col">{{ __('messages.medicine.category') }}</th>
                    <th scope="col">{{ __('messages.ipd_patient_charges.date') }}</th>
                    <th scope="col" class="text-right">{{ __('messages.invoice.amount') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bill['charges'] as $charge)
                    <tr>
                        <td>{{ $charge->charge_type }}</td>
                        <td>{{ $charge->chargecategory->name }}</td>
                        <td>{{ $charge->date->format('d/m/Y') }}</td>
                        <td class="text-right">{{ number_format($charge->applied_charge) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-right" colspan="4">
                        {{ __('messages.bill.total_amount').':' }}
                        <span class="pl-2 font-weight-bold"><i class="{{ getCurrenciesClass() }}"></i>
<span>{{ $bill['total_charges'] }}</span></span>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <h5>{{ __('messages.account.payments') }}</h5>
        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">{{ __('messages.ipd_payments.payment_mode') }}</th>
                    <th scope="col">{{ __('messages.ipd_patient_charges.date') }}</th>
                    <th scope="col" class="text-right">{{ __('messages.ipd_bill.paid_amount') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bill['payments'] as $payment)
                    <tr>
                        <td>{{ $payment->payment_mode_name }}</td>
                        <td>{{ $payment->date->format('d/m/Y') }}</td>
                        <td class="text-right">{{ number_format($payment->amount) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-right" colspan="4">
                        {{ __('messages.bill.total_amount').':' }}
                        <span class="pl-2 font-weight-bold"><i class="{{ getCurrenciesClass() }}"></i>
<span>{{ $bill['total_payment'] }}</span>
</span>
                    </td>
                </tr>
                </tfoot>
            </table>

        </div>
        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th class="h5 font-weight-bold" scope="col"
                        colspan="2">{{ __('messages.bill.bill_summary') }}</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>{{ __('messages.ipd_bill.paid_amount').':' }}</td>
                    <td class="text-right font-weight-bold"><span
                                id="totalPayments">{{ $bill['total_payment']  }}</span>
                </tr>
                <tr>
                    <td>{{ __('messages.ipd_bill.total_charges').':' }}</td>
                    <td class="text-right font-weight-bold"><span
                                id="totalCharges">{{ $bill['total_charges']  }}</span>
                </tr>
                <tr>
                    <td>{{ __('messages.ipd_bill.gross_total').':' }}</td>
                    <td class="text-right font-weight-bold"><span
                                id="grossTotal">{{ ($bill['gross_total'] > 0) ? $bill['gross_total'] : 0   }}</span>
                    </td>
                </tr>
                <tr>
                    <td>{{ __('messages.ipd_bill.discount_in_percentage').':' }}</td>
                    <td class="text-right font-weight-bold"><span id="discountPercent">{{ $bill['discount_in_percentage']  }} %</span>
                    </td>
                </tr>
                <tr>
                    <td>{{ __('messages.ipd_bill.tax_in_percentage').':' }}</td>
                    <td class="text-right font-weight-bold"><span
                                id="taxPercentage">{{ $bill['tax_in_percentage']  }} %</span>
                    </td>
                </tr>
                <tr>
                    <td>{{ __('messages.ipd_bill.other_charges').':' }}</td>
                    <td class="text-right font-weight-bold">
                        <span id="otherCharges"><i class="{{ getCurrenciesClass() }}"></i> {{ $bill['other_charges'] }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                        {{ __('messages.ipd_bill.net_payable_amount').':' }}
                        @if($ipdPatientDepartment->bill)
                            (<span
                                    id="billStatus">{{ ($ipdPatientDepartment->bill->net_payable_amount > 0) ? 'Unpaid' : 'Paid' }}</span>
                            )
                        @endif
                    </td>
                    <td class="text-right font-weight-bold"><i class="{{ getCurrenciesClass() }}"></i>
                        <span
                                id="netPayabelAmount">{{ ($ipdPatientDepartment->bill && $ipdPatientDepartment->bill->net_payable_amount > 0) ? $ipdPatientDepartment->bill->net_payable_amount : 0 }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        @if($ipdPatientDepartment->bill)
            <a href="{{ url('ipd-bills/'.$ipdPatientDepartment->id.'/pdf') }}" target="_blank"
               class="btn btn-secondary mx-2 font-weight-bold"
               id="printBillBtn">{{ __('messages.bill.print_bill')  }}</a>
        @endif
    </div>
</div>
