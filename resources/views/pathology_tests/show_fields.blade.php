<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('test_name', __('messages.pathology_test.test_name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $pathologyTest->test_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('short_name', __('messages.pathology_test.short_name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $pathologyTest->short_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('test_type', __('messages.pathology_test.test_type').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $pathologyTest->test_type }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('category_id', __('messages.pathology_test.category_name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $pathologyTest->pathologycategory->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('unit', __('messages.pathology_test.unit').':', ['class' => 'font-weight-bold']) }}
            <p>{{ (!empty($pathologyTest->unit)) ? $pathologyTest->unit : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('subcategory', __('messages.pathology_test.subcategory').':', ['class' => 'font-weight-bold']) }}
            <p>{{ (!empty($pathologyTest->subcategory)) ? $pathologyTest->subcategory : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('method', __('messages.pathology_test.method').':', ['class' => 'font-weight-bold']) }}
            <p>{{ (!empty($pathologyTest->method)) ? $pathologyTest->method : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('report_days', __('messages.pathology_test.report_days').':', ['class' => 'font-weight-bold']) }}
            <p>{{ (!empty($pathologyTest->report_days)) ? nl2br(e($pathologyTest->report_days)) : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('charge_category_id', __('messages.pathology_test.charge_category').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $pathologyTest->chargecategory->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('standard_charge', __('messages.pathology_test.standard_charge').':', ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($pathologyTest->standard_charge) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($pathologyTest->created_at)) }}">{{ $pathologyTest->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($pathologyTest->updated_at)) }}">{{ $pathologyTest->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
