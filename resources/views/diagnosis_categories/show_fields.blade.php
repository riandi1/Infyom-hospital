<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', __('messages.diagnosis_category.diagnosis_category').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $diagnosisCategory->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($diagnosisCategory->created_at)) }}">{{ $diagnosisCategory->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($diagnosisCategory->updated_at)) }}">{{ $diagnosisCategory->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('description', __('messages.diagnosis_category.description').':', ['class' => 'font-weight-bold']) }}
            <p> {!! !empty($diagnosisCategory->description)? nl2br(e($diagnosisCategory->description)):'N/A' !!}</p>
        </div>
    </div>
</div>
