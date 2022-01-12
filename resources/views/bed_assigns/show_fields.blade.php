<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient_name', __('messages.case.patient').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $bedAssign->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bed_name', __('messages.bed_assign.bed').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $bedAssign->bed->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.bed_assign.case_id').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $bedAssign->case_id  }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('ipd_patient_department_id', __('messages.bed_assign.ipd_patient_id').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ ($bedAssign->ipdPatient != null) ? $bedAssign->ipdPatient->ipd_number : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('assign_date', __('messages.bed_assign.assign_date').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ date('jS M,Y g:i A', strtotime($bedAssign->assign_date)) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('discharge_date', __('messages.bed_assign.discharge_date').(':'),['class'=>'font-weight-bold']) }}
            <p>{{  !empty($bedAssign->discharge_date)?date('jS M, Y h:i:s A', strtotime($bedAssign->discharge_date)):'N/A' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('description', __('messages.bed_assign.description').(':'),['class'=>'font-weight-bold']) }}
            <p>{!! !empty($bedAssign->description)?nl2br(e($bedAssign->description)):'N/A' !!}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status',__('messages.common.status').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ ($bedAssign->status === 1) ? 'Active' : 'Deactive' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($bedAssign->created_at)) }}">{{ $bedAssign->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($bedAssign->updated_at)) }}">{{ $bedAssign->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
