<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', __('messages.incomes.name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $incomes->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('income_head', __('messages.incomes.income_head').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $incomeHead[$incomes->income_head]  }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('invoice_number', __('messages.incomes.invoice_number').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($incomes->invoice_number)?$incomes->invoice_number:'N/A' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('date', __('messages.incomes.date').':', ['class' => 'font-weight-bold']) }}
            <p>{{date('jS M, Y', strtotime($incomes->date))}}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('amount', __('messages.incomes.amount').':', ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($incomes->amount, 2) }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('attachment', __('messages.incomes.attachment').':', ['class' => 'font-weight-bold']) }}
            <br>
            @if(!empty($incomes->document_url))
                <a href="{{$incomes->document_url}}" target="_blank">View</a>
            @else
                N/A
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('description', __('messages.incomes.description').':', ['class' => 'font-weight-bold']) }}
            <p> {!!!empty($incomes->description)? nl2br(e($incomes->description)):'N/A' !!}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($incomes->created_at)) }}">{{ $incomes->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($incomes->updated_at)) }}">{{ $incomes->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
