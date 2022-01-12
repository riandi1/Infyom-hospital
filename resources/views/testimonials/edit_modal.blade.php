<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.testimonial.edit_testimonial') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                <div class="row">
                    {{ Form::hidden('id',null,['id'=>'testimonialId']) }}
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('Name', __('messages.testimonial.name').':') }}<span
                                    class="required">*</span>
                            {{ Form::text('name', null, ['class' => 'form-control','required', 'id' => 'editName']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', __('messages.testimonial.description').':') }}<span
                                    class="required">*</span>
                            {{ Form::textarea('description', null, ['class' => 'form-control','required', 'rows' => 6, 'id' => 'editDescription']) }}
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <div class="row">
                            <div class="col-6">
                                {{ Form::label('profile', __('messages.common.profile').':') }}
                                <label class="image__file-upload"> {{__('messages.expense.choose')}}
                                    {{ Form::file('profile',['id'=>'editProfile','class' => 'd-none document-file']) }}
                                </label>
                                <a href="#" id="documentUrl" target="_blank"></a>
                            </div>
                            <div class="col-6 preview-image-video-container pl-0 mt-1">
                                <img id='editPreviewImage' class="img-thumbnail thumbnail-preview image-stretching"/>
                            </div>
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

