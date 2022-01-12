<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('item_category_id', __('messages.item_stock.item_category').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $itemStock->item->itemcategory->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('item_id', __('messages.item_stock.item').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $itemStock->item->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('supplier_name', __('messages.item_stock.supplier_name').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($itemStock->supplier_name) ? $itemStock->supplier_name : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('store_name', __('messages.item_stock.store_name').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($itemStock->store_name) ? $itemStock->store_name : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('quantity', __('messages.item_stock.quantity').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $itemStock->quantity }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('purchase_price', __('messages.item_stock.purchase_price').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ number_format($itemStock->purchase_price, 2) }}</p>
        </div>
    </div>
    @if(!empty($itemStock->item_stock_url))
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('attachment', __('messages.document.attachment').(':'), ['class' => 'font-weight-bold']) }}
                <br>
                <a href="{{ $itemStock->item_stock_url }}"
                   target="_blank">{{ __('messages.common.view') }}</a>
            </div>
        </div>
    @endif
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_on', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($itemStock->created_at)) }}">{{ $itemStock->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('last_updated', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($itemStock->updated_at)) }}">{{ $itemStock->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.item_stock.description').(':'), ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($itemStock->description) ? nl2br(e($itemStock->description)) : __('messages.common.n/a') !!}</p>
        </div>
    </div>
</div>
