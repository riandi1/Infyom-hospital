<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.bed.new_bed') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('name', __('messages.bed_assign.bed').(':')) }}<span
                                    class="required">*</span>
                            {{ Form::text('name', null, ['class' => 'form-control','required']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('bed_type', __('messages.bed.bed_type').':') }}<label
                                    class="required">*</label>
                            {{ Form::select('bed_type',$bedTypes, null, ['class' => 'form-control','required','id' => 'bedType','placeholder'=>'Select Bed Type']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('charge', __('messages.bed.charge').(':')) }}<span class="required">*</span>
                            {{ Form::text('charge', null, ['class' => 'form-control price-input','required']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', __('messages.bed.description').(':')) }}
                            {{ Form::textarea('description', null, ['class' => 'form-control','rows' => 4]) }}
                        </div>
                    </div>
                    <div class="text-right col-sm-12">
                        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
