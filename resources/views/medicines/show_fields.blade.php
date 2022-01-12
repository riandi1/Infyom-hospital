<div class="row view-spacer">
    <!-- Name Field -->
    <div class="form-group col-md-3">
        {{ Form::label('name', __('messages.medicine.medicine').(':'), ['class' => 'font-weight-bold']) }}
        <p>{{ $medicine->name }}</p>
    </div>

    <!-- Brand Id Field -->
    <div class="form-group col-md-3">
        {{ Form::label('brand_name', __('messages.medicine.brand').(':'), ['class' => 'font-weight-bold']) }}
        <p>{{ $medicine->brand->name }}</p>
    </div>

    <!-- Name Field -->
    <div class="form-group col-md-3">
        {{ Form::label('category_id', __('messages.medicine.category').(':'), ['class' => 'font-weight-bold']) }}
        <p>{{ $medicine->category->name }}</p>
    </div>

    <div class="form-group col-md-3">
        {{ Form::label('salt_composition', __('messages.medicine.salt_composition').(':'), ['class' => 'font-weight-bold']) }}
        <p>{{ $medicine->salt_composition }}</p>
    </div>

    <!-- Selling Price Field -->
    <div class="form-group col-md-3">
        {{ Form::label('selling_price', __('messages.medicine.selling_price').(':'), ['class' => 'font-weight-bold']) }}
        <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($medicine->selling_price, 2) }}</p>
    </div>

    <!-- Buying Price Field -->
    <div class="form-group col-md-3">
        {{ Form::label('buying_price', __('messages.medicine.buying_price').(':'), ['class' => 'font-weight-bold']) }}
        <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($medicine->buying_price, 2) }}</p>
    </div>

    <div class="form-group col-md-3">
        {{ Form::label('side_effects', __('messages.medicine.side_effects').(':'), ['class' => 'font-weight-bold']) }}
        <p>{!! !empty($medicine->side_effects)?nl2br(e($medicine->side_effects)):'N/A'  !!}</p>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_on', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($medicine->created_at)) }}">{{ $medicine->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('last_updated', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($medicine->updated_at)) }}">{{ $medicine->updated_at->diffForHumans() }}</span>
        </div>
    </div>

    <div class="form-group col-md-3">
        {{ Form::label('description', __('messages.medicine.description').(':'), ['class' => 'font-weight-bold']) }}
        <p>{!! !empty($medicine->description)?nl2br(e($medicine->description)):'N/A' !!} </p>
    </div>
</div>
