<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', __('messages.item.name').':',['class'=>'font-weight-bold']) }}
            <p>{{ $item->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('item_category_id', __('messages.item.item_category').':',['class'=>'font-weight-bold']) }}
            <p>{{ $item->itemcategory->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('unit', __('messages.item.unit').':',['class'=>'font-weight-bold']) }}
            <p>{{ $item->unit }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('available_quantity', __('messages.item.available_quantity').':',['class'=>'font-weight-bold']) }}
            <p>{{ $item->available_quantity }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($item->created_at)) }}">{{ $item->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($item->updated_at)) }}">{{ $item->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('description', __('messages.item.description').':',['class'=>'font-weight-bold']) }}
            <p>{!! !empty($item->description) ? nl2br(e($item->description)) : __('messages.common.n/a')  !!}</p>
        </div>
    </div>
</div>
