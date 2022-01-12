<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.case.case_id').':',['class'=>'font-weight-bold']) }}
            <p>{{ $patientCase->case_id }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient_name', __('messages.case.patient').':',['class'=>'font-weight-bold']) }}
            <p>{{ $patientCase->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone', __('messages.case.phone').':',['class'=>'font-weight-bold']) }}
            <p>{{ !empty($patientCase->phone)?$patientCase->phone:'N/A' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_name', __('messages.case.doctor').':',['class'=>'font-weight-bold']) }}
            <p>{{ $patientCase->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('date', __('messages.case.case_date').':',['class'=>'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($patientCase->date)->format('jS M,Y g:i A') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($patientCase->status === 1) ? 'Active' : 'Deactive' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('fee', __('messages.case.fee').':',['class'=>'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($patientCase->fee,2) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':',['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($patientCase->created_at)) }}">{{ $patientCase->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':',['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($patientCase->updated_at)) }}">{{ $patientCase->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.case.description').':',['class'=>'font-weight-bold']) }}
            <p>{!! !empty($patientCase->description)? nl2br(e($patientCase->description)): 'N/A' !!}</p>
        </div>
    </div>
</div>

