<div class="row view-spacer">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('charge_type', __('messages.charge_category.charge_type').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $chargeTypes[$charge->charge_type] }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('charge_category', __('messages.charge.charge_category').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $charge->chargeCategory->name }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('code', __('messages.charge.code').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $charge->code }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('standard_charge', __('messages.charge.standard_charge').(':'),['class'=>'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($charge->standard_charge, 0) }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($charge->created_at)) }}">{{ $charge->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($charge->updated_at)) }}">{{ $charge->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.death_report.description').(':'),['class'=>'font-weight-bold']) }}
            <p>{!! !empty($charge->description)?nl2br(e($charge->description)):'N/A'  !!} </p>
        </div>
    </div>
</div>
