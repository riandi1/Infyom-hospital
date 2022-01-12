<div id="startModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="start-modal-title"></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('live_consultation_id',null,['id'=>'startLiveConsultationId']) }}
                <div class="row">
                    <div class="form-group col-sm-4">
                        {{ Form::label('host', __('messages.live_consultation.host_video').(':')) }}<br>
                        <span class="host-name"></span>
                    </div>
                    <div class="form-group col-sm-4">
                        {{ Form::label('date', __('messages.live_consultation.consultation_date').(':')) }}<br>
                        <span class="date"></span>
                    </div>
                    <div class="form-group col-sm-4">
                        {{ Form::label('duration', __('messages.live_consultation.duration').(':')) }}<br>
                        <span class="minutes"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="text-left col-sm-8">
                        {{ Form::label('status', __('messages.common.status').(':')) }}<br>
                        <span class="status"></span>
                    </div>
                    <div class="text-right col-sm-4 mt-4">
                        <a class="btn btn-outline-success btn-sm start" href="" target="_blank">
                            <i class="fas fa-video"></i> {{ getLoggedInUser()->hasRole('Doctor|Admin') ? __('messages.live_consultation.start_now') : __('messages.live_consultation.join_now') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
