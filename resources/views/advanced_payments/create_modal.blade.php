<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.advanced_payment.new_advanced_payment') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::label('patient_id', __('messages.advanced_payment.patient').(':')) }}<label
                                class="required">*</label>
                        {{ Form::select('patient_id',$patients, null, ['class' => 'form-control','required','id' => 'patientId','placeholder'=>'Select Patient']) }}
                    </div>
                    <div class="col-md-12 mt-3">
                        {{ Form::label('receipt_no', __('messages.advanced_payment.receipt_no').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('receipt_no', $receiptNo, ['class' => 'form-control','required','readonly']) }}
                    </div>
                    <div class="col-md-12 mt-3">
                        {{ Form::label('amount', __('messages.advanced_payment.amount').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('amount', null, ['class' => 'form-control price-input','required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '7']) }}
                    </div>
                    <div class="col-md-12 mt-3">
                        {{ Form::label('date', __('messages.advanced_payment.date').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('date', null, ['class' => 'form-control','required','id' => 'date', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="text-right col-sm-12 mt-4">
                        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
