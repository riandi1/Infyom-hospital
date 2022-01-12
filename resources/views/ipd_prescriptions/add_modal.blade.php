<div id="addIpdPrescriptionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.ipd_patient_prescription.new_prescription') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addIpdPrescriptionForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                {{ Form::hidden('ipd_patient_department_id',$ipdPatientDepartment->id, ['id'=>'ipdPatientDepartmentId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('header_note', __('messages.ipd_patient_prescription.header_note').':', ['class' => 'font-weight-bold']) }}
                        {{ Form::textarea('header_note', null, ['class' => 'form-control', 'rows' => 4]) }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 overflow-auto">
                        <table class="table table-bordered" id="ipdPrescriptionTbl">
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
                                            id="addPrescriptionItem"
                                            data-edit="0">{{ __('messages.common.add') }}</button>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="ipd-prescription-item-container">
                            <tr>
                                <td class="text-center prescription-item-number" data-item-number="1">1</td>
                                <td>
                                    {{ Form::select('category_id[]', $medicineCategories, null, ['class' => 'form-control categoryId select2Selector','required','placeholder'=>'Select Category', 'data-id' => '1']) }}
                                </td>
                                <td>
                                    {{ Form::select('medicine_id[]', [null], null, ['class' => 'form-control medicineId select2Selector', 'disabled', 'data-medicine-id' => '1']) }}
                                </td>
                                <td>
                                    {{ Form::text('dosage[]', null, ['class' => 'form-control dosage','required']) }}
                                </td>
                                <td>
                                    {{ Form::textarea('instruction[]', null, ['class' => 'form-control instruction', 'rows' => 4,'required']) }}
                                </td>
                                <td class="text-center">
                                    <i class="fa fa-trash text-danger deleteIpdPrescription pointer"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="py-0 my-0 mb-3">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('footer_note', __('messages.ipd_patient_prescription.footer_note').':', ['class' => 'font-weight-bold']) }}
                        {{ Form::textarea('footer_note', null, ['class' => 'form-control', 'rows' => 4]) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnIpdPrescriptionSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
