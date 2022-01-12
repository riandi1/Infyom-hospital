<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.notice_board.edit') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                <div class="row">
                    {{ Form::hidden('notice_board_id',null,['id'=>'noticeBoardId']) }}
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('title', __('messages.notice_board.title').':') }}<span
                                    class="required">*</span>
                            {{ Form::text('title', null, ['class' => 'form-control','required', 'id' => 'editTitle']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', __('messages.notice_board.description').':') }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 6, 'id' => 'editDescription']) }}
                        </div>
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
