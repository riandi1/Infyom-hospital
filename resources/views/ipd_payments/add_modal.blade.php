<div id="addIpdPaymentModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.ipd_payments.add_ipd_payment') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addIpdPaymentNewForm']) }}
            <div class="modal-body">
                @if($ipdPatientDepartment->bill)
                    <div class="alert alert-warning">
                        <span>Note: After adding Payment you must need to re-generate Bill.</span>
                    </div>
                @endif
                <div class="alert alert-danger display-none" id="paymentValidationErrorsBox"></div>
                {{ Form::hidden('ipd_patient_department_id',$ipdPatientDepartment->id, ['id'=>'ipdPatientDepartmentId']) }}
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        {{ Form::label('amount', __('messages.ambulance_call.amount').':') }}<span
                                class="required">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend ">
                                <div class="input-group-text"><i class="{{ getCurrenciesClass() }}"></i></div>
                            </div>
                            {{ Form::text('amount', null, ['class' => 'form-control price-input','id' => 'ipdPaymentAmount', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <div class="form-group">
                            {{ Form::label('date', __('messages.ipd_patient_charges.date').':') }}<label
                                    class="required">*</label>
                            {{ Form::text('date', null, ['class' => 'form-control','id' => 'ipdPaymentDate','autocomplete' => 'off', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('charge_type_id', __('messages.ipd_payments.payment_mode').':') }}<span
                                class="required">*</span>
                        {{ Form::select('payment_mode', $paymentModes, null, ['class' => 'form-control select2Selector', 'id' => 'paymentModeId', 'required','placeholder'=>'Select Payment Mode']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="row">
                            <div class="col">
                                {{ Form::label('document', __('messages.ipd_patient_diagnosis.document').':') }}
                                <label class="image__file-upload"> Choose
                                    {{ Form::file('file',['id'=>'paymentDocumentImage','class' => 'd-none document-file']) }}
                                </label>
                            </div>
                            <div class="col mt-2">
                                <img id='paymentPreviewImage' class="img-thumbnail thumbnail-preview image-stretching"
                                     src="{{ asset('assets/img/default_image.jpg') }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('notes', __('messages.ipd_patient.notes').':') }}
                            {{ Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 4]) }}
                        </div>
                    </div>

                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnIpdPaymentSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
