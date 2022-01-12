<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tagHeader">{{ __('messages.document.new_document') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('title', __('messages.document.title').':') }}<span class="required">*</span>
                        {{ Form::text('title', null, ['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('document_type', __('messages.document.document_type').':') }}<span
                                class="required">*</span>
                        {{ Form::select('document_type_id', $documentType, null, ['class' => 'form-control select2Selector','required', 'id' => 'documentTypeId','placeholder' => __('messages.document.select_document_type')]) }}
                    </div>
                    @if(Auth::user()->hasRole('Patient'))
                        <input type="hidden" name="patient_id" value="{{ Auth::user()->owner_id }}">
                    @else
                        <div class="form-group col-sm-6">
                            {{ Form::label('patient', __('messages.document.patient').':') }}<span
                                    class="required">*</span>
                            {{ Form::select('patient_id', $patients, null, ['class' => 'form-control select2Selector','required', 'id' => 'patientId', 'placeholder' => __('messages.document.select_patient')]) }}
                        </div>
                    @endif
                    <div class="form-group col-sm-6">
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                {{ Form::label('file', __('messages.document.attachment').':') }}<span class="required">*</span>
                                <label class="image__file-upload"> {{ __('messages.common.choose') }}
                                    {{ Form::file('file',['id'=>'documentImage','class' => 'd-none document-file']) }}
                                </label>
                            </div>
                            <div class="col-sm-4 col-4 mt-1">
                                <img id='previewImage' class="img-thumbnail thumbnail-preview image-stretching"
                                     src="{{ asset('assets/img/default_image.jpg') }}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        {{ Form::label('notes', __('messages.document.notes').':') }}
                        {{ Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 5]) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
