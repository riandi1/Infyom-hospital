<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('messages.postal.edit_receive')}}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox1"></div>
                {{ Form::hidden('id',null,['id'=>'editReceiveId']) }}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('From Title',__('messages.postal.from_title').':') }}<span
                                class="required">*</span>
                        {{ Form::text('from_title', null, ['class' => 'form-control','required','id' => 'editFromTitle']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('Reference Number',__('messages.postal.reference_no').':') }}
                        {{ Form::text('reference_no', null, ['class' => 'form-control','id' => 'editReferenceNumber']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('date', __('messages.postal.date').':') }}
                        {{ Form::text('date', null, ['class' => 'form-control','id' => 'date',  'autocomplete' => 'off','id' => 'editDate']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('To Title',__('messages.postal.to_title').':') }}
                        {{ Form::text('to_title', null, ['class' => 'form-control','id' => 'editToTitle']) }}
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="col-6">
                                {{ Form::label('attachment', __('messages.expense.attachment').':') }}
                                <label class="image__file-upload"> {{__('messages.expense.choose')}}
                                    {{ Form::file('attachment',['id'=>'editAttachment','class' => 'd-none document-file editAttachment']) }}
                                </label>
                                <a href="#" id="documentUrl" target="_blank"></a>
                            </div>
                            <div class="col-5 preview-image-video-container pl-0 mt-1">
                                <img id='editPreviewImage' class="img-thumbnail thumbnail-preview image-stretching"
                                     src="" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('Address', __('messages.postal.address').':') }}
                        {{ Form::textarea('address', null, ['class' => 'form-control', 'rows' => 4, 'id' => 'editAddress']) }}
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

