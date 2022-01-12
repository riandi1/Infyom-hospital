<div id="EditModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.account.edit_account') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('accountId',null,['id'=>'accountId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.account.account').(':')) }}<span class="required">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control','required','id'=>'editName']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description', __('messages.account.description').(':')) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4,'id'=>'editDescription']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('type', __('messages.account.type').(':')) }}<span
                                            class="required">*</span>&nbsp;<br>
                                    <p class="p-radio"><input type="radio" name="type" id="editDebit" value="1"
                                                              class="radio"> Debit &nbsp;</p>
                                    <p class="p-radio">&nbsp;&nbsp;&nbsp;<input type="radio" name="type" id="editCredit"
                                                                                value="2"
                                                                                class="radio"> Credit</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                {{ Form::label('status', __('messages.common.status').(':')) }}
                                <label class="switch switch-label switch-outline-primary-alt d-block">
                                    <input name="status" class="switch-input" type="checkbox" value="1"
                                           id="editIsActive">
                                    <span class="switch-slider" data-checked="&#x2713;"
                                          data-unchecked="&#x2715;"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancelEdit" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
