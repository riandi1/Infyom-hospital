<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.medicine.edit_medicine_category') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('category_id',null,['id'=>'category_id']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name',__('messages.medicine.category').':') }}<span class="required">*</span>
                        {{ Form::text('name', '', ['id'=>'edit_name','class' => 'form-control','required']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="is_active">{{__('messages.common.status')}}:</label>
                        <label class="switch switch-label switch-outline-primary-alt swich-center d-block">
                            <input name="is_active" data-id="5" class="switch-input" type="checkbox" value="1"
                                   checked="" id="edit_is_active">
                            <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                        </label>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button('Save', ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light ml-1" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
