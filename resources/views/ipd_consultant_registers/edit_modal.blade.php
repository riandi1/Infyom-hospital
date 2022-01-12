<div id="editIpdConsultantInstructionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.ipd_patient_consultant_register.edit_consultant_register') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editIpdConsultantNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('id',null,['id'=>'ipdEditConsultantId']) }}
                {{ Form::hidden('ipd_patient_department_id',$ipdPatientDepartment->id, ['id'=>'ipdPatientDepartmentId']) }}
                <div class="row">
                    <div class="form-group col-md-12">
                        {{ Form::label('applied_date', __('messages.ipd_patient_consultant_register.applied_date').':') }}
                        <label
                                class="required">*</label>
                        {{ Form::text('applied_date', null, ['class' => 'form-control appliedDate min-w-170 modelDataPickerzindex', 'id' => 'ipdEditAppliedDate', 'autocomplete' => 'off', 'required']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('doctor_id', __('messages.ipd_patient_consultant_register.doctor_id').':') }}
                        <span
                                class="required">*</span>
                        {{ Form::select('doctor_id', $doctors, null, ['class' => 'form-control doctorId select2Selector','required','placeholder'=>'Select Doctor', 'id' => 'editDoctorId']) }}
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::label('instruction_date', __('messages.ipd_patient_consultant_register.instruction_date').':') }}
                        <label
                                class="required">*</label>
                        {{ Form::text('instruction_date', null, ['class' => 'form-control instructionDate min-w-170', 'autocomplete' => 'off', 'required', 'id' => 'editInstructionDate']) }}
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::label('instruction', __('messages.ipd_patient_consultant_register.instruction').':') }}
                        <label
                                class="required">*</label>
                        {{ Form::textarea('instruction', null, ['class' => 'form-control min-w-170', 'rows' => 4, 'required', 'id' => 'editConsultantInstruction']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditIpdConsultantSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
