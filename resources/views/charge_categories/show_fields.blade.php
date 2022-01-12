<div class="row view-spacer">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('name', __('messages.charge.charge_category').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $chargeCategory->name }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('charge_type', __('messages.charge_category.charge_type').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $chargeTypes[$chargeCategory->charge_type] }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($chargeCategory->created_at)) }}">{{ $chargeCategory->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($chargeCategory->updated_at)) }}">{{ $chargeCategory->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.death_report.description').(':'),['class'=>'font-weight-bold']) }}
            <p>{!! !empty($chargeCategory->description)? nl2br(e($chargeCategory->description)):'N/A'  !!}</p>
        </div>
    </div>
</div>
