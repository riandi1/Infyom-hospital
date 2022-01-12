<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            {{ Form::label('name', __('messages.package.package').(':')) }}<label class="required">*</label>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            {{ Form::label('discount', __('messages.package.discount').(':')) }}<label class="required">*</label>(%)
            {{ Form::text('discount', null, ['class' => 'form-control discount', 'onkeypress' => 'return isNumberKey(event, this)', 'placeholder' => 'In percentage', 'maxlength' => '4', 'required']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.package.description').(':')) }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>
    </div>

    {{-- Package Service Dynamic Table layout start --}}

    <div class="col-sm-12">
        <table class="table table-bordered table-responsive-sm" id="billTbl">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th>{{ __('messages.package.service') }}<span class="required">*</span></th>
                <th>{{ __('messages.package.qty') }}<span class="required">*</span></th>
                <th>{{ __('messages.package.rate') }}<span class="required">*</span></th>
                <th class="text-right">{{ __('messages.package.amount') }}</th>
                <th class="table__add-btn-heading text-center">
                    <button type="button" class="btn btn-sm btn-primary w-100"
                            id="addItem">{{ __('messages.common.add') }}</button>
                </th>
            </tr>
            </thead>
            <tbody class="package-service-item-container">
            @if(isset($package))
                @foreach($package->packageServicesItems as $packageServiceItem)
                    <tr>
                        <td class="text-center item-number">{{ $loop->iteration }}</td>
                        <td class="table__item-desc">
                            {{ Form::select('service_id[]', $servicesList, $packageServiceItem->service_id, ['class' => 'form-control serviceId','required', 'placeholder' => __('messages.package.select_service')]) }}
                            {{ Form::hidden('id[]', $packageServiceItem->id) }}
                        </td>
                        <td class="table__qty service-qty">
                            {{ Form::number('quantity[]', $packageServiceItem->quantity, ['class' => 'form-control qty','required']) }}
                        </td>
                        <td class="service-price">
                            {{ Form::text('rate[]', number_format($packageServiceItem->rate), ['class' => 'form-control price-input price','required']) }}
                        </td>
                        <td class="amount text-right item-total">
                            {{ number_format($packageServiceItem->amount) }}
                        </td>
                        <td class="text-center">
                            <i class="fa fa-trash text-danger delete-service-package-item pointer"></i>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center item-number">1</td>
                    <td class="table__item-desc">
                        {{ Form::select('service_id[]', $servicesList, null, ['class' => 'form-control serviceId','required', 'placeholder' => __('messages.package.select_service')]) }}
                    </td>
                    <td class="table__qty service-qty">
                        {{ Form::number('quantity[]', null, ['class' => 'form-control qty','required']) }}
                    </td>
                    <td class="service-price">
                        {{ Form::text('rate[]', null, ['class' => 'form-control price-input price','required']) }}
                    </td>
                    <td class="amount text-right item-total">
                    </td>
                    <td class="text-center">
                        <i class="fa fa-trash text-danger delete-service-package-item pointer"></i>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="col-lg-2 col-md-4 col-sm-4 float-right p-0 mb-3">
            <table class="w-100">
                <tbody class="bill-item-footer">
                <tr>
                    <td class="font-weight-bold">{{ __('messages.package.total_amount').(':') }}</td>
                    <td class="font-weight-bold text-right"><b>{{ getCurrencySymbol() }}</b>&nbsp;<span id="total"
                                                                                                        class="price">{{ isset($package) ? number_format($package->total_amount,2) : 0 }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Package Service Dynamic Table layout end --}}

<!-- Total Amount Field -->
    {{ Form::hidden('total_amount', null, ['class' => 'form-control', 'id' => 'total_amount']) }}

    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id'=>'saveBtn']) }}
        <a href="{{ route('packages.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
