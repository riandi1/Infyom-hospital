<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('name', __('messages.item.name').':') !!}<span class="required">*</span>
            {!! Form::text('name', null, ['id'=>'name','class' => 'form-control','required']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('item_category_id', __('messages.item.item_category').':') !!}<span
                    class="required">*</span>
            {{ Form::select('item_category_id', $itemCategories, null, ['id' => 'itemCategory','class' => 'form-control','required','placeholder' => 'Select Item Category']) }}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('unit', __('messages.item.unit').':') !!}<span class="required">*</span>
            {!! Form::text('unit', null, ['id'=>'unit','class' => 'form-control','required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '4','minlength' => '1']) !!}
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.item.description').(':')) }}
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'btnSave']) !!}
        <a href="{!! route('items.index') !!}" class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a>
    </div>
</div>
