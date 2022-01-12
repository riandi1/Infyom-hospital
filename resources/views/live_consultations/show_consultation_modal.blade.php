<div id="showModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.live_consultations') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('live_consultation_id',null,['id'=>'startLiveConsultationId']) }}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('consultation_title', __('messages.live_consultation.consultation_title').(':'),  ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationTitle"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('consultation_date', __('messages.live_consultation.consultation_date').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationDate"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('consultation_duration_minutes', __('messages.live_consultation.consultation_duration_minutes').(':'),  ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationDurationMinutes"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('patient_id', __('messages.blood_issue.patient_name').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationPatient"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('doctor_id', __('messages.blood_issue.doctor_name').(':'),  ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationDoctor"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('type', __('messages.live_consultation.type').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationType"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('type_number', __('messages.live_consultation.type_number').(':'),  ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationTypeNumber"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('host_video', __('messages.live_consultation.host_video').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationHostVideo"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('participant_video', __('messages.live_consultation.client_video').(':'),  ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationParticipantVideo"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('description', __('messages.testimonial.description').(':'), ['class' => 'font-weight-bold']) }}
                        <br>
                        <span id="consultationDescription"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
