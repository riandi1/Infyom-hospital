<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('test_name', __('messages.radiology_test.test_name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $radiologyTest->test_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('short_name', __('messages.radiology_test.short_name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $radiologyTest->short_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('test_type', __('messages.radiology_test.test_type').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $radiologyTest->test_type }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('category_id', __('messages.radiology_test.category_name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $radiologyTest->radiologycategory->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('subcategory', __('messages.radiology_test.subcategory').':', ['class' => 'font-weight-bold']) }}
            <p>{{ (!empty($radiologyTest->subcategory)) ? $radiologyTest->subcategory : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('report_days', __('messages.radiology_test.report_days').':', ['class' => 'font-weight-bold']) }}
            <p>{{ (!empty($radiologyTest->report_days)) ? $radiologyTest->report_days : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('charge_category_id', __('messages.radiology_test.charge_category').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $radiologyTest->chargecategory->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('standard_charge', __('messages.radiology_test.standard_charge').':', ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($radiologyTest->standard_charge) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($radiologyTest->created_at)) }}">{{ $radiologyTest->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($radiologyTest->updated_at)) }}">{{ $radiologyTest->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
