<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.medicine.new_medicine_category') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.medicine.category').':') }}<span class="required">*</span>
                        {{ Form::text('name', '', ['id'=>'name','class' => 'form-control','required']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-2 col-md-2">
                        {{ Form::label('active', __('messages.common.status').':') }}
                        <label class="switch switch-label switch-outline-primary-alt d-block user-swich" tabindex="12">
                            <input name="is_active" class="switch-input" type="checkbox"
                                   value="1" {{(old('is_active'))?'checked':''}} checked>
                            <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
                        </label>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button('Save', ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light ml-1" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
