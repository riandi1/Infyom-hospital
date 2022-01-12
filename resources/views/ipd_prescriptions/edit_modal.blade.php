<div id="editIpdPrescriptionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.ipd_patient_prescription.edit_prescription') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editIpdPrescriptionForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('id',null,['id'=>'ipdEditPrescriptionId']) }}
                {{ Form::hidden('ipd_patient_department_id',$ipdPatientDepartment->id, ['id'=>'editIpdPatientDepartmentId']) }}

                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('header_note', __('messages.ipd_patient_prescription.header_note').':', ['class' => 'font-weight-bold']) }}
                        {{ Form::textarea('header_note', null, ['class' => 'form-control', 'id' => 'editHeaderNote', 'rows' => 4]) }}
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-12 overflow-auto">
                        <table class="table table-bordered" id="editIpdPrescriptionTbl">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="ipdMedicineCategory">{{ __('messages.ipd_patient_prescription.category_id') }}
                                    <span class="required">*</span></th>
                                <th class="ipdMedicineId">{{ __('messages.ipd_patient_prescription.medicine_id') }}</th>
                                <th class="ipdDosage">{{ __('messages.ipd_patient_prescription.dosage') }}<span
                                            class="required">*</span></th>
                                <th class="ipdPrescriptionInstruction">{{ __('messages.ipd_patient_prescription.instruction') }}
                                    <span class="required">*</span></th>
                                <th class="text-center">
                                    <button type="button" class="btn btn-sm btn-primary w-100"
                                            id="addPrescriptionItemOnEdit"
                                            data-edit="1">{{ __('messages.common.add') }}</button>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="edit-ipd-prescription-item-container"></tbody>
                        </table>
                    </div>
                </div>

                <hr class="py-0 my-0 mb-3">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('footer_note', __('messages.ipd_patient_prescription.footer_note').':', ['class' => 'font-weight-bold']) }}
                        {{ Form::textarea('footer_note', null, ['class' => 'form-control', 'id' => 'editFooterNote', 'rows' => 4]) }}
                    </div>
                </div>

                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditIpdPrescriptionSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancelEdit" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
