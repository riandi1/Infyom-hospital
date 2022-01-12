<div id="addCredential" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.live_consultation.add_credential') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addZoomForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="credentialValidationErrorsBox"></div>
                {{ Form::hidden('user_id',getLoggedInUserId(),['id'=>'userId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('zoom_api_key', __('messages.live_consultation.zoom_api_key').(':')) }}
                        <span
                                class="required">*</span>
                        {{ Form::text('zoom_api_key', '', ['class' => 'form-control','required', 'id' => 'zoomApiKey', 'autocomplete' => 'off']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('zoom_api_secret', __('messages.live_consultation.zoom_api_secret').(':')) }}
                        <span
                                class="required">*</span>
                        {{ Form::text('zoom_api_secret', '', ['class' => 'form-control','required', 'id' => 'zoomApiSecret', 'autocomplete' => 'off']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary','id' => 'btnZoomSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
