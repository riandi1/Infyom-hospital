<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('messages.testimonial.new_testimonial')}}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm','files' => true]) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('Name',__('messages.testimonial.name').':') }}<span class="required">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('Description', __('messages.testimonial.description').':') }}<span
                                class="required">*</span>
                        {{  Form::textarea('description', null, ['class' => 'form-control','required', 'rows' => 4])  }}
                    </div>
                    <div class="form-group col-md-8">
                        <div class="row">
                            <div class="col-6">
                                {{ Form::label('profile', __('messages.common.profile').':') }}
                                <label class="image__file-upload"> {{__('messages.expense.choose')}}
                                    {{ Form::file('profile',['id'=>'profile','class' => 'd-none document-file']) }}
                                </label>
                            </div>
                            <div class="col-6 preview-image-video-container pl-0 mt-1">
                                <img id='previewImage' class="img-thumbnail thumbnail-preview image-stretching"
                                     src="{{ asset('assets/img/default_image.jpg') }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="text-right col-sm-12 mt-4">
                        {{ Form::button( __('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

