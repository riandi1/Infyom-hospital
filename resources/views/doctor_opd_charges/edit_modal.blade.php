<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.doctor_opd_charge.edit_doctor_opd_charge') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                <div class="row">
                    {{ Form::hidden('id',null,['id'=>'doctorOPDChargeId']) }}
                    <div class="col-md-12">
                        {{ Form::label('doctor_id', __('messages.doctor_opd_charge.doctor').(':')) }}<label
                                class="required">*</label>
                        {{ Form::select('doctor_id',$doctors, null, ['class' => 'form-control', 'autocomplete' => 'off', 'required','id' => 'editDoctorId','placeholder'=>'Select Patient']) }}
                    </div>
                    <div class="col-md-12 mt-3">
                        {{ Form::label('standard_charge', __('messages.doctor_opd_charge.standard_charge').(':')) }}
                        <span
                                class="required">*</span>
                        {{ Form::text('standard_charge', null, ['class' => 'form-control price-input', 'required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'id' => 'editStandardCharge']) }}
                    </div>
                    <div class="text-right col-sm-12 mt-3">
                        {{ Form::button( __('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
