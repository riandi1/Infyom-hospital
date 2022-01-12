<!-- Name Field -->
<div class="form-group col-md-6">
    {{ Form::label('name', __('messages.medicine.medicine').(':')) }}<span class="required">*</span>
    {{ Form::text('name', null, ['class' => 'form-control','minlength' => 2, 'id' => 'medicineNameId']) }}
</div>

<!-- Category Field -->
<div class="form-group col-md-6">
    {{ Form::label('category_id', __('messages.medicine.category').(':')) }}<span class="required">*</span>
    {{ Form::select('category_id', $categories, (isset($medicine)) ? $medicine->category_id : null, ['class' => 'form-control', 'placeholder' => 'Select Category', 'id' => 'categoryId']) }}
</div>

<!-- Name Field -->
<div class="form-group col-md-6">
    {{ Form::label('brand_id', __('messages.medicine.brand').(':')) }}<span class="required">*</span>
    {{ Form::select('brand_id', $brands,  (isset($medicine)) ? $medicine->brand_id : null, ['class' => 'form-control', 'placeholder' => 'Select Brand', 'id' => 'brandId']) }}
</div>

<!-- Salt Composition Field -->
<div class="form-group col-md-6">
    {{ Form::label('salt_composition', __('messages.medicine.salt_composition').(':')) }}<span
            class="required">*</span>
    {{ Form::text('salt_composition', null, ['class' => 'form-control','required']) }}
</div>

<!-- Buying Price Field -->
<div class="form-group col-md-6">
    {{ Form::label('buying_price', __('messages.medicine.buying_price').(':')) }}<span class="required">*</span>
    {{ Form::text('buying_price', null, ['class' => 'form-control price-input']) }}
</div>

<!-- Selling Price Field -->
<div class="form-group col-md-6">
    {{ Form::label('selling_price', __('messages.medicine.selling_price').(':')) }}<span class="required">*</span>
    {{ Form::text('selling_price', null, ['class' => 'form-control price-input']) }}
</div>

<!-- Effect Field -->
<div class="form-group col-md-6">
    {{ Form::label('side_effects', __('messages.medicine.side_effects').(':')) }}
    {{ Form::textarea('side_effects', null, ['class' => 'form-control', 'rows'=>4]) }}
</div>

<!-- Effect Field -->
<div class="form-group col-md-6">
    {{ Form::label('description', __('messages.medicine.description').(':')) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows'=>4]) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {{ Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'saveBtn']) }}
    <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Cancel</a>
</div>
