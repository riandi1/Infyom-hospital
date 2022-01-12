<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('name', __('messages.insurance.insurance').(':')) }}<label class="required">*</label>
        {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('service_tax', __('messages.insurance.service_tax').(':')) }}<label class="required">*</label>
        {{ Form::text('service_tax', null, ['class' => 'form-control service-tax price-input', 'required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('discount', __('messages.insurance.discount').(': ')) }} (In percentage (%))
        {{ Form::text('discount', null, ['class' => 'form-control discount', 'id'=>'discountId','onkeypress' => 'return isNumberKey(event, this)', 'maxlength' => '4',]) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('insurance_no', __('messages.insurance.insurance_no').(':')) }}<label
                class="required">*</label>
        {{ Form::text('insurance_no', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('insurance_code', __('messages.insurance.insurance_code').(':')) }}<label
                class="required">*</label>
        {{ Form::text('insurance_code', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('hospital_rate', __('messages.insurance.hospital_rate').(':')) }}<label
                class="required">*</label>
        {{ Form::text('hospital_rate', null, ['class' => 'form-control hospital-rate price-input', 'required']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('remark', __('messages.insurance.remark').(':')) }}
        {{ Form::textarea('remark', null, ['class' => 'form-control', 'rows' => 4]) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('status', __('messages.common.status').(':')) }}
        <label class="switch switch-label switch-outline-primary-alt d-block">
            <input name="status" class="switch-input" type="checkbox" value="1"
                    {{(!isset($insurance)) ? 'checked':(($insurance->status) ? 'checked' : '')}}>
            <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
        </label>
    </div>
    <hr>
    <div class="col-sm-12 mt-3">
        <div class="mb-3 h5">
            {{ __('messages.insurance.disease_details') }}
        </div>
        <table class="table table-bordered table-responsive-sm" id="billTbl">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th class="insurance-name">{{ __('messages.insurance.diseases_name') }}<span
                            class="required">*</span></th>
                <th class="insurance-name">{{ __('messages.insurance.diseases_charge') }}<span
                            class="required">*</span></th>
                <th>
                    <button type="button" class="btn btn-sm btn-primary float-right w-100"
                            id="addItem">{{ __('messages.common.add') }}</button>
                </th>
            </tr>
            </thead>
            <tbody class="disease-item-container">
            @if(isset($diseases))
                @foreach($diseases as $disease)
                    <tr>
                        <td class="text-center item-number">{{ $loop->iteration }}</td>
                        <td>
                            {{ Form::text('disease_name[]', $disease->disease_name, ['class' => 'form-control disease-name','required']) }}
                        </td>
                        <td>
                            {{ Form::text('disease_charge[]', $disease->disease_charge,
                                                    ['class' => 'form-control disease-charge price-input','required']) }}
                        </td>
                        <td class="text-center">
                            <i class="fa fa-trash text-danger delete-disease pointer"></i>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center item-number">1</td>
                    <td>
                        {{ Form::text('disease_name[]', null, ['class' => 'form-control disease-name','required']) }}
                    </td>
                    <td>
                        {{ Form::text('disease_charge[]', null, ['class' => 'form-control disease-charge price-input','required']) }}
                    </td>
                    <td class="text-center">
                        <i class="fa fa-trash text-danger delete-disease pointer"></i>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="col-lg-2 col-md-4 col-sm-4 float-right p-0 mb-3">
            <table class="w-100">
                <tbody>
                <tr>
                    <td class="font-weight-bold">{{ __('messages.insurance.total_amount').(':') }}</td>
                    <td class="font-weight-bold text-right"><b>{{ getCurrencySymbol() }}</b>&nbsp;
                        <span id="total" class="totalAmount">{{ isset($insurance) ? number_format($insurance->total,2) : 0 }}
                                </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Total Amount Field -->
    {{ Form::hidden('total', null, ['class' => 'form-control', 'id' => 'total_amount']) }}
    <div class="form-group col-sm-12 text-right mt-2">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id'=>'saveBtn']) }}
        <a href="{{ route('insurances.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
