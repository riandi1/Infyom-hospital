<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.blood_issue.new_blood_issue') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('issue_date', __('messages.blood_issue.issue_date').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('issue_date', '', ['id'=>'issueDate','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('doctor_id', __('messages.blood_issue.doctor_name').(':')) }}<span
                                class="required">*</span>
                        {{ Form::select('doctor_id', $doctors, null, ['class' => 'form-control select2Selector', 'id' => 'doctorName','placeholder' => 'Select Doctor Name', 'required']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('patient_id', __('messages.blood_issue.patient_name').(':')) }}<span
                                class="required">*</span>
                        {{ Form::select('patient_id', $patients, null, ['class' => 'form-control select2Selector', 'id' => 'patientName','placeholder' => 'Select Patient Name', 'required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('donor_id', __('messages.blood_issue.donor_name').(':')) }}<span
                                class="required">*</span>
                        {{ Form::select('donor_id', $donors, null, ['class' => 'form-control select2Selector', 'id' => 'donorName','placeholder' => 'Select Donor Name', 'required']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('blood_group', __('messages.user.blood_group').(':')) }}
                        {{ Form::select('blood_group', [], null, ['class' => 'form-control','id' => 'bloodGroup', 'disabled', 'required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('amount', __('messages.blood_issue.amount').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('amount', '', ['id' => 'amount', 'class' => 'form-control price-input price', 'required', 'maxlength' => '9']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('remarks', __('messages.blood_issue.remarks').(':')) }}
                        {{ Form::textarea('remarks', '', ['id' => 'remarks','class' => 'form-control','rows' => 3,'cols' => 3]) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary','id' => 'btnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
