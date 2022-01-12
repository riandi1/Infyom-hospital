<div id="EditModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.ipd_patient_diagnosis.edit_ipd_diagnosis') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('id',null,['id'=>'ipdDiagnosisId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('report_type', __('messages.ipd_patient_diagnosis.report_type').':') }}<span
                                class="required">*</span>
                        {{ Form::text('report_type', null, ['class' => 'form-control','required', 'id' => 'editReportType']) }}
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::label('report_date', __('messages.ipd_patient_diagnosis.report_date').':') }}<label
                                class="required">*</label>
                        {{ Form::text('report_date', null, ['class' => 'form-control','id' => 'editReportDate','autocomplete' => 'off', 'required']) }}
                    </div>
                    <div class="form-group col-md-12 mb-0">
                        <div class="form-group">
                            {{ Form::label('description', __('messages.ipd_patient_diagnosis.description').':') }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4, 'id' => 'editDescription']) }}
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="row">
                            <div class="col">
                                {{ Form::label('document', __('messages.ipd_patient_diagnosis.document').':') }}
                                <label class="image__file-upload"> Choose
                                    {{ Form::file('file',['id'=>'editDocumentImage','class' => 'd-none document-file']) }}
                                </label>
                                <a href="#" id="documentViewUrl"
                                   target="_blank">{{ __('messages.common.view') }}</a>
                            </div>
                            <div class="col mt-2">
                                <img id='editPreviewImage' class="img-thumbnail thumbnail-preview image-stretching"
                                     src="{{ asset('assets/img/default_image.jpg') }}"/>
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
