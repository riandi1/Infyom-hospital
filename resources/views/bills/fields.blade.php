<div class="row">
    <div class="col-md-3">
        {{ Form::label('patient_admission_id', __('messages.bill.admission_id').(':'),['class'=>'font-weight-bold']) }}
        <span class="required">*</span>
        {{ Form::select('patient_admission_id', $patientAdmissionIds, null, ['class' => 'form-control', 'id' => 'patientAdmissionId', 'placeholder' => 'Select Admission Id']) }}
    </div>
    {{ Form::hidden('patient_admission_id', null, ['id' => 'pAdmissionId']) }}
    {{ Form::hidden('patient_id', null, ['id' => 'patientId']) }}
    <div class="col-md-3">
        {{ Form::label('bill_date', __('messages.bill.bill_date').(':'),['class'=>'font-weight-bold']) }}<span
                class="required">*</span>
        {{ Form::text('bill_date', null, ['class' => 'form-control', 'id' => 'bill_date', 'autocomplete' => 'off']) }}
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('name', __('messages.case.patient').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('email', __('messages.bill.patient_email').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'userEmail', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone', __('messages.bill.patient_cell_no').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'userPhone', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('gender', __('messages.bill.patient_gender').(':'),['class'=>'font-weight-bold']) }}<br>
            <input type="radio" name="gender" id="male" value="0"> {{ __('messages.user.male') }}
            <input type="radio" name="gender" id="female" value="1"> {{ __('messages.user.female') }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('dob', __('messages.bill.patient_dob').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('dob', null, ['class' => 'form-control', 'id' => 'dob', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.case.doctor').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('doctor_id', null, ['class' => 'form-control', 'id' => 'doctorId', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('admission_date', __('messages.bill.admission_date').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('admission_date', null, ['class' => 'form-control', 'id' => 'admissionDate', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('discharge_date', __('messages.bill.discharge_date').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('discharge_date', null, ['class' => 'form-control', 'id' => 'dischargeDate', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('package_id', __('messages.bill.package_name').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('package_id', null, ['class' => 'form-control', 'id' => 'packageId', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('insurance_id', __('messages.bill.insurance_name').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('insurance_id', null, ['class' => 'form-control', 'id' => 'insuranceId', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('total_days', __('messages.bill.total_days').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('total_days', null, ['class' => 'form-control', 'id' => 'totalDays', 'readonly']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('policy_no', __('messages.bill.policy_no').(':'),['class'=>'font-weight-bold']) }}
            {{ Form::text('policy_no', null, ['class' => 'form-control', 'id' => 'policyNo', 'readonly']) }}
        </div>
    </div>
</div>
<hr>
<div class="com-sm-12 ">
    <div class="table-responsive-sm">
        <table class="table table-bordered min-w-600" id="billTbl">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th>{{ __('messages.bill.item_name') }}<span class="required">*</span></th>
                <th>{{ __('messages.bill.qty') }}<span class="required">*</span></th>
                <th>{{ __('messages.bill.price') }}<span class="required">*</span></th>
                <th class="text-right">{{ __('messages.bill.amount') }}</th>
                <th class="table__add-btn-heading text-center">
                    <button type="button" class="btn btn-sm btn-primary w-100"
                            id="addItem">{{ __('messages.bill.add') }}</button>
                </th>
            </tr>
            </thead>
            <tbody class="bill-item-container">
            @if(isset($bill))
                @foreach($bill->billItems as $billItem)
                    <tr>
                        <td class="text-center item-number">{{ $loop->iteration }}</td>
                        <td class="table__item-desc">
                            {{ Form::text('item_name[]', $billItem->item_name, ['class' => 'form-control itemName','required']) }}
                        </td>
                        <td class="table__qty">
                            {{ Form::number('qty[]', $billItem->qty, ['class' => 'form-control qty quantity','required']) }}
                        </td>
                        <td>
                            {{ Form::text('price[]', number_format($billItem->price), ['class' => 'form-control price-input price','required']) }}
                        </td>
                        <td class="amount text-right itemTotal">{{ number_format($billItem->amount) }}
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
                        {{ Form::text('item_name[]', null, ['class' => 'form-control itemName','required']) }}
                    </td>
                    <td class="table__qty">
                        {{ Form::number('qty[]', null, ['class' => 'form-control qty quantity','required',]) }}
                    </td>
                    <td>
                        {{ Form::text('price[]', null, ['class' => 'form-control price-input price','required']) }}
                    </td>
                    <td class="amount text-right itemTotal">
                    </td>
                    <td class="text-center">
                        <i class="fa fa-trash text-danger delete-invoice-item pointer"></i>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 float-right p-0">
        <table class="w-100">
            <tbody class="bill-item-footer">
            <tr>
                <td class="font-weight-bold text-right">{{ __('messages.bill.total_amount').(':') }}</td>
                <td class="font-weight-bold text-right"><b>{{ getCurrencySymbol() }}</b>
                    <span id="total" class="price">{{ isset($bill) ? number_format($bill->amount,2) : 0 }}</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Total Amount Field -->
{{ Form::hidden('total_amount', null, ['class' => 'form-control', 'id' => 'totalAmount']) }}

<!-- Submit Field -->
<div class="form-group col-sm-12 form-buttons">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'saveBtn']) }}
    <a href="{{ route('bills.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
