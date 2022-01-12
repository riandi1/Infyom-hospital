<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.operation_report.new_operation_report') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('case_id', __('messages.case.case').(':')) }}<span
                                    class="required">*</span>
                            {{ Form::select('case_id', $cases, null, ['class' => 'form-control','required','id' => 'caseId','placeholder'=>'Select Case']) }}
                        </div>
                    </div>
                    @if(Auth::user()->hasRole('Doctor'))
                        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
                    @else
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('doctor_id', __('messages.case.doctor').(':')) }}<span
                                        class="required">*</span>
                                {{ Form::select('doctor_id', $doctors, null, ['class' => 'form-control','required','id' => 'doctorId','placeholder'=>'Select Doctor']) }}
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('date', __('messages.operation_report.date').(':')) }}<span
                                    class="required">*</span>
                            {{ Form::text('date', null, ['class' => 'form-control','required','id' => 'date','autocomplete' => 'off']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', __('messages.operation_report.description').(':')) }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) }}
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
