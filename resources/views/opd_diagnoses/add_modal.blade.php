<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.ipd_patient_diagnosis.new_ipd_diagnosis') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                {{ Form::hidden('opd_patient_department_id',$opdPatientDepartment->id, ['id'=>'opdPatientDepartmentId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('report_type', __('messages.ipd_patient_diagnosis.report_type').':') }}<span
                                class="required">*</span>
                        {{ Form::text('report_type', null, ['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-md-12 mb-0">
                        <div class="form-group">
                            {{ Form::label('report_date', __('messages.ipd_patient_diagnosis.report_date').':') }}<label
                                    class="required">*</label>
                            {{ Form::text('report_date', null, ['class' => 'form-control','id' => 'reportDate','autocomplete' => 'off', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group col-md-12 mb-0">
                        <div class="form-group">
                            {{ Form::label('description', __('messages.ipd_patient_diagnosis.description').':') }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="row">
                            <div class="col-4">
                                {{ Form::label('document', __('messages.ipd_patient_diagnosis.document').':') }}
                                <label class="image__file-upload"> Choose
                                    {{ Form::file('file',['id'=>'documentImage','class' => 'd-none document-file']) }}
                                </label>
                            </div>
                            <div class="col-2 mt-2">
                                <img id='previewImage' class="img-thumbnail thumbnail-preview image-stretching"
                                     src="{{ asset('assets/img/default_image.jpg') }}"/>
                            </div>
                        </div>
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
