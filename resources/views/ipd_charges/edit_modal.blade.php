<div id="editIpdChargesModal" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.ipd_patient_charges.edit_charge') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editIpdChargesForm']) }}
            <div class="modal-body">
                @if($ipdPatientDepartment->bill)
                    <div class="alert alert-warning">
                        <span>Note: After adding charge you must need to re-generate Bill.</span>
                    </div>
                @endif
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('id',null,['id'=>'ipdChargesId']) }}
                <div class="row">
                    <div class="form-group col-md-6 mb-0">
                        {{ Form::label('date', __('messages.ipd_patient_charges.date').':') }}<label
                                class="required">*</label>
                        {{ Form::text('date', null, ['class' => 'form-control modelDataPickerzindex','id' => 'ipdEditChargeDate','autocomplete' => 'off', 'required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('charge_type_id', __('messages.ipd_patient_charges.charge_type_id').':') }}<span
                                class="required">*</span>
                        {{ Form::select('charge_type_id', $chargeTypes, null, ['class' => 'form-control select2Selector', 'id' => 'editChargeTypeId', 'required','placeholder'=>'Select Charge Type', 'data-is-charge-edit' => 1]) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('charge_category_id', __('messages.ipd_patient_charges.charge_category_id').':') }}
                        <span class="required">*</span>
                        {{ Form::select('charge_category_id', [null], null, ['class' => 'form-control select2Selector', 'id' => 'editChargeCategoryId', 'required', 'disabled', 'data-is-charge-edit' => 1]) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('charge_id', __('messages.ipd_patient_charges.charge_id').':') }}<span
                                class="required">*</span>
                        {{ Form::select('charge_id', [null], null, ['class' => 'form-control select2Selector', 'id' => 'editChargeId', 'required', 'disabled', 'data-is-charge-edit' => 1]) }}
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <div class="form-group">
                            {{ Form::label('standard_charge', __('messages.ipd_patient_charges.standard_charge').':') }}
                            {{ Form::text('standard_charge', null, ['class' => 'form-control price-input','id' => 'editIpdStandardCharge', 'readonly']) }}
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <div class="form-group">
                            {{ Form::label('applied_charge', __('messages.ipd_patient_charges.applied_charge').':') }}
                            (<span id="appliedChargeId"></span>)
                            {{ Form::text('applied_charge', null, ['class' => 'form-control price-input','id' => 'editIpdAppliedCharge', 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditCharges','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancelEdit" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
