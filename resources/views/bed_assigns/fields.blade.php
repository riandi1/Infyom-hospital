<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('case_id', __('messages.case.case').(':')) }}<span class="required">*</span>
        {{ Form::select('case_id', $cases, null, ['class' => 'form-control','required','id' => 'caseId','placeholder'=>'Select Case',isset($bedAssign->case_id) ? 'disabled' : '']) }}
        @if(isset($bedAssign->case_id))
            {{Form::hidden('case_id',$bedAssign->case_id)}}
        @endif
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('ipd_patient_department_id', __('messages.ipd_patient.ipd_patient').':') }}
        {{ Form::select('ipd_patient_department_id', [null], null, ['class' => 'form-control','id' => 'ipdPatientId', 'disabled']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('bed_id', __('messages.bed_assign.bed').(':')) }}<label class="required">*</label>
        {{ Form::select('bed_id',$beds, isset($bedId) ? $bedId : null, ['class' => 'form-control','required','id' => 'bedId','placeholder'=>'Select Bed']) }}
    </div>
    <div class="form-group col-sm-6 date-container">
        {{ Form::label('assign_date', __('messages.bed_assign.assign_date').(':')) }}<label class="required">*</label>
        {{ Form::text('assign_date', null, ['id'=>'assignDate', 'class' => 'form-control', 'required']) }}
    </div>
    @isset($bedAssign)
        <div class="form-group col-sm-6 ">
            {{ Form::label('discharge_date', __('messages.bed_assign.discharge_date').(':')) }}
            {{ Form::text('discharge_date', null, ['id'=>'dischargeDate', 'class' => 'form-control','autocomplete'=>'off']) }}
        </div>
    @endisset
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':') }}<br>
            <label class="switch switch-label switch-outline-primary-alt swich-center">
                <input name="status" class="switch-input is-active" type="checkbox"
                       value="1" {{ (isset($bedAssign) && $bedAssign->status === 1) ? 'checked' : '' }} {{ !isset($bedAssign) ? 'checked' : '' }}>
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
            </label>
        </div>
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('description', __('messages.bed_assign.description').(':')) }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
    </div>
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'saveBtn']) }}
        <a href="{{ route('bed-assigns.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
