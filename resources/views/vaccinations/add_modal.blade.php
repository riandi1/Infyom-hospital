<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.vaccination.new_vaccination') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.vaccination.name').(':')) }}<span class="required">*</span>
                        {{ Form::text('name', '', ['id'=>'name','class' => 'form-control','required']) }}
                    </div>

                    <div class="form-group col-sm-12">
                        {{ Form::label('manufactured_by', __('messages.vaccination.manufactured_by').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('manufactured_by', '', ['id'=>'manufacturedBy','class' => 'form-control','required']) }}
                    </div>

                    <div class="form-group col-sm-12">
                        {{ Form::label('brand', __('messages.vaccination.brand').(':')) }}<span
                                class="required">*</span>
                        {{ Form::text('brand', '', ['id'=>'brand','class' => 'form-control','required']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary','id' => 'btnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
