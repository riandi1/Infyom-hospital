<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.vaccinated_patient.edit_vaccinate_patient') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('vaccinated_patient_id',null,['id'=>'vaccinatedPatientId']) }}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('patient_id', __('messages.vaccinated_patient.patient').(':')) }}<span
                                class="required">*</span>
                        {{ Form::select('patient_id', $patients, null, ['class' => 'form-control select2Selector', 'id' => 'editPatientName','placeholder' => 'Select Patient Name', 'required']) }}
                    </div>

                    <div class="form-group col-sm-6">
                        {{ Form::label('vaccination_id', __('messages.vaccinated_patient.vaccination').(':')) }}<span
                                class="required">*</span>
                        {{ Form::select('vaccination_id', $vaccinations, null, ['class' => 'form-control select2Selector', 'id' => 'editVaccinationName','placeholder' => 'Select Vaccination', 'required']) }}
                    </div>

                    <div class="form-group col-sm-12">
                        {{ Form::label('vaccination_serial_number', __('messages.vaccinated_patient.serial_no').(':')) }}
                        {{ Form::text('vaccination_serial_number', '', ['id'=>'editSerialNo','class' => 'form-control']) }}
                    </div>

                    <div class="form-group col-sm-6">
                        {{ Form::label('dose_number', __('messages.vaccinated_patient.does_no').(':')) }}<span
                                class="required">*</span>
                        {{ Form::number('dose_number', '', ['id'=>'editDoseNumber','class' => 'form-control','min'=>'1','max'=>'50','minlength'=>'1','maxlength'=>'2','required']) }}
                    </div>
                    @php $currentLang = app()->getLocale() @endphp
                    <div class="form-group col-sm-6">
                        {{ Form::label('dose_given_date', __('messages.vaccinated_patient.dose_given_date').(':'),['class' => $currentLang == 'es' ? 'label-display' : '']) }}
                        <span class="required">*</span>
                        {{ Form::text('dose_given_date', '', ['id'=>'editDoesGivenDate','class' => 'form-control','required','autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description', __('messages.document.notes').(':')) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4,'id'=>'editDescription']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary','id' => 'editBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
