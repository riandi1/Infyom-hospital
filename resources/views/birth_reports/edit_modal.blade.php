<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.birth_report.edit_birth_report') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                <div class="row">
                    {{ Form::hidden('birth_Report_id',null,['id'=>'birthReportId']) }}
                    <div class="form-group col-sm-12">
                        {{ Form::label('case_id', __('messages.case.case').(':')) }}<span
                                class="required">*</span>
                        {{ Form::select('case_id', $cases, null, ['class' => 'form-control','required','id' => 'editCaseId','placeholder'=>'Select Case']) }}
                    </div>
                    @if(Auth::user()->hasRole('Doctor'))
                        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
                    @else
                        <div class="form-group col-sm-12">
                            {{ Form::label('doctor_name', __('messages.case.doctor').(':')) }}<label
                                    class="required">*</label>
                            {{ Form::select('doctor_id',$doctors, null, ['class' => 'form-control','required','id' => 'editDoctorId','placeholder'=>'Select Doctor']) }}
                        </div>
                    @endif
                    <div class="form-group col-sm-12">
                        {{ Form::label('date', __('messages.birth_report.date').(':')) }}<label
                                class="required">*</label>
                        {{ Form::text('date', null, ['id'=>'editDate', 'class' => 'form-control', 'required','autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description', __('messages.birth_report.description').(':')) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4, 'id' => 'editDescription']) }}
                    </div>
                    <div class="text-right col-sm-12">
                        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
