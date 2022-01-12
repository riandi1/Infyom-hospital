<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.diagnosis_category.new_diagnosis_category') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.diagnosis_category.diagnosis_category').':') }}<span
                                class="required">*</span>
                        {{ Form::text('name', '', ['id'=>'name','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description', __('messages.diagnosis_category.description').':') }}
                        {{ Form::textarea('description', '', ['id'=>'description','class' => 'form-control','rows' => 5]) }}
                    </div>
                </div>
                <div class="text-right col-sm-12 mt-4">
                    {{ Form::button( __('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
