<div id="showModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.live_meetings') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('live_consultation_id',null,['id'=>'showLiveConsultationId']) }}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('consultation_title', __('messages.live_consultation.consultation_title').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="meetingTitle"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('consultation_date', __('messages.live_consultation.consultation_date').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="meetingDate"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('consultation_duration_minutes', __('messages.live_consultation.consultation_duration_minutes').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="meetingMinutes"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('host_video', __('messages.live_consultation.host_video').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="meetingHost"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('participant_video', __('messages.live_consultation.client_video').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="meetingParticipant"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('description', __('messages.testimonial.description').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="meetingDescription"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
