<div class="col-sm-12 table-responsive-sm">
    <table class="table table-bordered min-w-1000" id="bulkBedsTbl">
        <thead class="thead-dark">
        <tr>
            <th class="text-center">#</th>
            <th>{{ __('messages.bed_assign.bed')}}<span class="required">*</span></th>
            <th>{{ __('messages.bed.bed_type') }}<span class="required">*</span></th>
            <th>{{ __('messages.bed.charge') }}<span class="required">*</span></th>
            <th>{{ __('messages.bed.description') }}</th>
            <th class="text-center bulk-bed-add">
                <button type="button" class="btn btn-sm btn-primary w-100"
                        id="addItem">{{ __('messages.bed.add') }}</button>
            </th>
        </tr>
        </thead>
        <tbody class="bulk-beds-item-container">
        <tr>
            <td class="text-center item-number">1</td>
            <td class="name">
                {{ Form::text('name[]', null, ['class' => 'form-control bedName', 'required']) }}
            </td>
            <td class="bed_type">
                {{ Form::select('bed_type[]', $bedTypes, null, ['class' => 'form-control bedType', 'id' => 'bedType', 'required', 'placeholder'=>'Select Bed Type']) }}
            </td>
            <td class="rate">
                {{ Form::text('charge[]', null, ['class' => 'form-control charge price-input','required']) }}
            </td>
            <td>
                {{ Form::textarea('description[]', null, ['class' => 'form-control description','rows' => 3]) }}
            </td>
            <td class="text-center">
                <i class="fa fa-trash text-danger delete-invoice-item pointer"></i>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-group col-sm-12 form-buttons bedBtn">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
    <a href="{{ route('beds.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
