<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', __('messages.expense.name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $expenses->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('income_head', __('messages.expense.expense_head').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $expenseHead[$expenses->expense_head] }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('invoice_number', __('messages.expense.invoice_number').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($expenses->invoice_number)?$expenses->invoice_number:'N/A' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('date', __('messages.expense.date').':', ['class' => 'font-weight-bold']) }}
            <p>{{date('jS M, Y', strtotime($expenses->date))}}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('amount', __('messages.expense.amount').':', ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($expenses->amount, 2) }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('attachment', __('messages.expense.attachment').':', ['class' => 'font-weight-bold']) }}
            <br>
            @if(!empty($expenses->document_url))
                <a href="{{$expenses->document_url}}" target="_blank">View</a>
            @else
                N/A
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('description', __('messages.expense.description').':', ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($expenses->description)? nl2br(e($expenses->description)):'N/A' !!}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($expenses->created_at)) }}">{{ $expenses->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($expenses->updated_at)) }}">{{ $expenses->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
