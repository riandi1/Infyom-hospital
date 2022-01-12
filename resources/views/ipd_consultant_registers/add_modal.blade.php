<div id="addConsultantInstructionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.ipd_patient_consultant_register.new_consultant_register') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addIpdConsultantNewForm']) }}
            <div class="modal-body ipdConsultantModel">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                {{ Form::hidden('ipd_patient_department_id',$ipdPatientDepartment->id, ['id'=>'ipdPatientDepartmentId']) }}
                <div class="row">
                    <div class="col-sm-12 md-overflow-auto ipdConsultantCon">
                        <table class="consultant-table consultant-table-bordered table-responsive"
                               id="ipdConsultantInstructionTbl">
                            <thead class="consultant-table-theme">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="ipdAppliedDate">{{ __('messages.ipd_patient_consultant_register.applied_date') }}
                                    <span class="required">*</span></th>
                                <th class="ipdDoctorId">{{ __('messages.ipd_patient_consultant_register.doctor_id') }}
                                    <span class="required">*</span></th>
                                <th class="ipdInstructionDate">{{ __('messages.ipd_patient_consultant_register.instruction_date') }}
                                    <span class="required">*</span></th>
                                <th class="ipdInstruction">{{ __('messages.ipd_patient_consultant_register.instruction') }}
                                    <span class="required">*</span></th>
                                <th class="text-center">
                                    <button type="button" class="btn btn-sm btn-primary w-100"
                                            id="addItem">{{ __('messages.common.add') }}</button>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="ipd-consultant-item-container">
                            <tr>
                                <td class="text-center item-number consultant-table-td">1</td>
                                <td class="consultant-table-td position-relative">
                                    {{ Form::text('applied_date[]', null, ['class' => 'form-control appliedDate min-w-170', 'autocomplete' => 'off', 'required']) }}
                                </td>
                                <td class="consultant-table-td">
                                    {{ Form::select('doctor_id[]', $doctors, null, ['class' => 'form-control doctorId select2Selector','required','placeholder'=>'Select Doctor']) }}
                                </td>
                                <td class="consultant-table-td position-relative">
                                    {{ Form::text('instruction_date[]', null, ['class' => 'form-control instructionDate min-w-170', 'autocomplete' => 'off', 'required']) }}
                                </td>
                                <td class="consultant-table-td">
                                    {{ Form::textarea('instruction[]', null, ['class' => 'form-control min-w-170', 'rows' => 4, 'required']) }}
                                </td>
                                <td class="text-center consultant-table-td">
                                    <i class="fa fa-trash text-danger deleteIpdConsultantInstruction pointer"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnIpdConsultantSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
