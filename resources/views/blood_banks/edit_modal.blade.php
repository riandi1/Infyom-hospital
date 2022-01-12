<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.hospital_blood_bank.edit_blood_group') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('blood_bank_id',null,['id'=>'bloodBankId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('blood_group', __('messages.hospital_blood_bank.blood_group').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('blood_group', '', ['id'=>'editBloodGroup','class' => 'form-control']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-12">
                        {{ Form::label('remained_bags', __('messages.hospital_blood_bank.remained_bags').(':')) }}
                        <span class="required">*</span>
                        {{ Form::number('remained_bags', '', ['id'=>'editRemainedBags','class' => 'form-control','required', 'min' => 1]) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
