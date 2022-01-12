<div id="EditModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('messages.expense.edit_expense')}}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('id',null,['id'=>'editExpenseId']) }}
                <div class="row">

                    <div class="form-group col-sm-12">
                        {{ Form::label('expense_head', __('messages.expense.expense_head').':') }}<label
                                class="required">*</label>
                        {{ Form::select('expense_head', $expenseHeads, null, ['class' => 'form-control','required', 'id' => 'editExpenseHeadId']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('name',__('messages.expense.name').':') }}<span class="required">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control','required', 'id' => 'editName']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('date', __('messages.expense.date').':') }}<label class="required">*</label>
                        {{ Form::text('date', null, ['class' => 'form-control','required', 'id' => 'editDate',  'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('invoice_number', __('messages.expense.invoice_number').':') }}
                        {{ Form::text('invoice_number', null, ['class' => 'form-control', 'id' => 'editInvoiceNumber']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('amount', __('messages.expense.amount').':') }}<span class="required">*</span>
                        {{ Form::text('amount', null, ['class' => 'form-control price-input', 'autocomplete' => 'off', 'required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'id' => 'editAmount']) }}
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="col-6">
                                {{ Form::label('attachment', __('messages.expense.attachment').':') }}
                                <label class="image__file-upload"> {{__('messages.expense.choose')}}
                                    {{ Form::file('attachment',['id'=>'editAttachment','class' => 'd-none document-file']) }}
                                </label>
                                <a href="#" id="documentUrl"
                                   target="_blank"></a>
                            </div>
                            <div class="col-5 preview-image-video-container pl-0 mt-1">
                                <img id='editPreviewImage' class="img-thumbnail thumbnail-preview image-stretching"
                                     src=""/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description', __('messages.expense.description').':') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4, 'id' => 'editDescription']) }}
                    </div>
                    <div class="text-right col-sm-12 mt-3">
                        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" id="btnCancelEdit" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
