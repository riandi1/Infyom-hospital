<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.charge_category.edit_charge_category') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                <div class="row">
                    {{ Form::hidden('charge_category_id',null,['id'=>'chargeCategoryId']) }}
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.charge.charge_category').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control','required','id' => 'editName']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description', __('messages.birth_report.description').(':')) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4,'id' => 'editDescription']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('charge_type', __('messages.charge_category.charge_type').(':')) }}<span
                                class="required">*</span>
                        {{ Form::select('charge_type', $chargeTypes, null, ['class' => 'form-control','required','id' => 'editChargeTypeId','placeholder'=>'Select Charge Type']) }}
                    </div>
                    <div class="text-right col-sm-12">
                        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
