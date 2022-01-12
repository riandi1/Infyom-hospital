<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('department_id', __('messages.issued_item.department_id').':') !!}<span
                    class="required">*</span>
            {{ Form::select('department_id', $data['userTypes'], null, ['id' => 'userType','class' => 'form-control','required','placeholder' => 'Select User Type']) }}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('user_id', __('messages.issued_item.user_id').':') !!}<span
                    class="required">*</span>
            {{ Form::select('user_id', [null], null, ['id' => 'issueTo','class' => 'form-control','required','disabled']) }}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('issued_by', __('messages.issued_item.issued_by').':') !!}<span
                    class="required">*</span>
            {!! Form::text('issued_by', null, ['id'=>'issuedBy', 'class' => 'form-control', 'required']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('issued_date', __('messages.issued_item.issued_date').':') !!}<span
                    class="required">*</span>
            {!! Form::text('issued_date', null, ['id'=>'issueDate', 'class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('return_date', __('messages.issued_item.return_date').':') !!}
            {!! Form::text('return_date', null, ['id'=>'returnDate', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('item_category_id', __('messages.issued_item.item_category').':') !!}<span
                    class="required">*</span>
            {{ Form::select('item_category_id', $data['itemCategories'], null, ['id' => 'itemCategory','class' => 'form-control','required','placeholder' => 'Select Item Category']) }}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('item_id', __('messages.issued_item.item').':') !!}<span
                    class="required">*</span>
            {{ Form::select('item_id', [null], null, ['id' => 'items','class' => 'form-control','required','disabled']) }}
        </div>
    </div>
    <div class="col-lg-4 col-md-5 col-sm-12">
        <div class="form-group">
            {!! Form::hidden('available_quantity', null, ['id'=>'availableQuantity']) !!}
            {!! Form::label('quantity', __('messages.issued_item.quantity').':') !!}<span class="required">*</span>
            (<span>{{ __('messages.item.available_quantity') . ':' }} <span id="showAvailableQuantity">0</span></span>)
            {!! Form::number('quantity', null, ['id'=>'quantity','class' => 'form-control', 'required', 'min' => 1, 'disabled']) !!}
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.item_stock.description').(':')) }}
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'btnSave']) !!}
        <a href="{!! route('issued.item.index') !!}" class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a>
    </div>
</div>
