<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('department_id', __('messages.issued_item.department_id').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $issuedItem->department->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('user_id', __('messages.issued_item.user_id').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $issuedItem->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('issued_by', __('messages.issued_item.issued_by').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $issuedItem->issued_by }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('issued_date', __('messages.issued_item.issued_date').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ $issuedItem->issued_date->diffForHumans() }}">{{ date('jS M, Y', strtotime($issuedItem->issued_date)) }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('return_date', __('messages.issued_item.return_date').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            @if(!empty($issuedItem->return_date))
                <span data-toggle="tooltip" data-placement="right"
                      title="{{ $issuedItem->return_date->diffForHumans() }}">{{ date('jS M, Y', strtotime($issuedItem->return_date)) }}</span>
            @else
                {{ __('messages.common.n/a') }}
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('item_category_id', __('messages.issued_item.item_category').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $issuedItem->item->itemcategory->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('item_id', __('messages.issued_item.item').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $issuedItem->item->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('quantity', __('messages.issued_item.quantity').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $issuedItem->quantity }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ ($issuedItem->status) ? __('messages.issued_item.item_returned') : __('messages.issued_item.item_return') }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_on', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($issuedItem->created_at)) }}">{{ $issuedItem->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            {{ Form::label('description', __('messages.issued_item.description').(':'), ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($issuedItem->description) ? nl2br(e($issuedItem->description)) : __('messages.common.n/a') !!}</p>
        </div>
    </div>
</div>
