<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('item_category_id', __('messages.item_stock.item_category').':') !!}<span
                    class="required">*</span>
            {{ Form::select('item_category_id', $itemCategories, null, ['id' => 'itemCategory','class' => 'form-control','required','placeholder' => 'Select Item Category']) }}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('item_id', __('messages.item_stock.item').':') !!}<span
                    class="required">*</span>
            {{ Form::select('item_id', [null], null, ['id' => 'items','class' => 'form-control','required','disabled']) }}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('supplier_name', __('messages.item_stock.supplier_name').':') !!}
            {!! Form::text('supplier_name', null, ['id'=>'supplierName','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('store_name', __('messages.item_stock.store_name').':') !!}
            {!! Form::text('store_name', null, ['id'=>'storeName','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('quantity', __('messages.item_stock.quantity').':') !!}<span class="required">*</span>
            {!! Form::text('quantity', null, ['id'=>'quantity','class' => 'form-control','required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '4','minlength' => '1']) !!}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('purchase_price', __('messages.item_stock.purchase_price').':') !!}<span
                    class="required">*</span>
            {!! Form::text('purchase_price', null, ['id'=>'purchasePrice','class' => 'form-control price-input','required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '6','minlength' => '1']) !!}
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.item_stock.description').(':')) }}
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    {{ Form::label('attachment', __('messages.document.attachment').':') }}
                    <label class="image__file-upload"> {{ __('messages.common.choose') }}
                        {{ Form::file('attachment',['id'=>'attachment','class' => 'd-none attachment-file']) }}
                    </label>
                </div>
                <div class="col-2 mt-2">
                    <img id='previewImage' class="img-thumbnail thumbnail-preview image-stretching"
                         src="{{ asset('assets/img/default_image.jpg') }}"/>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-sm-12">
        {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'btnSave']) !!}
        <a href="{!! route('item.stock.index') !!}" class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a>
    </div>
</div>
