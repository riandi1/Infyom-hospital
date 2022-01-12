<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.ipd_patient.patient_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $opdPatientDepartment->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.ipd_patient.case_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($opdPatientDepartment->case_id) ? $opdPatientDepartment->patientCase->case_id : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('ipd_number', __('messages.opd_patient.opd_number').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $opdPatientDepartment->opd_number }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('height', __('messages.ipd_patient.height').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($opdPatientDepartment->height) ? $opdPatientDepartment->height : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('weight', __('messages.ipd_patient.weight').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($opdPatientDepartment->weight) ? $opdPatientDepartment->weight : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bp', __('messages.ipd_patient.bp').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($opdPatientDepartment->bp) ? $opdPatientDepartment->bp : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('admission_date', __('messages.opd_patient.appointment_date').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ \Carbon\Carbon::parse($opdPatientDepartment->appointment_date)->diffForHumans() }}">{{ date('jS M, Y', strtotime($opdPatientDepartment->appointment_date)) }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.ipd_patient.doctor_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $opdPatientDepartment->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bed_type_id', __('messages.ipd_payments.payment_mode').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $opdPatientDepartment->payment_mode_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bed_id', __('messages.doctor_opd_charge.standard_charge').':', ['class' => 'font-weight-bold']) }}
            <p><i class="{{ getCurrenciesClass() }}"></i> {{ number_format($opdPatientDepartment->standard_charge) }}
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('is_old_patient', __('messages.ipd_patient.is_old_patient').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($opdPatientDepartment->is_old_patient) ? __('messages.common.yes') : __('messages.common.no') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($opdPatientDepartment->created_at)) }}">{{ $opdPatientDepartment->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($opdPatientDepartment->updated_at)) }}">{{ $opdPatientDepartment->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('symptoms', __('messages.ipd_patient.symptoms').':', ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($opdPatientDepartment->symptoms)?nl2br(e($opdPatientDepartment->symptoms)) : __('messages.common.n/a') !!}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('notes', __('messages.ipd_patient.notes').':', ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($opdPatientDepartment->notes)?nl2br(e($opdPatientDepartment->notes)) : __('messages.common.n/a') !!}</p>
        </div>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.opd_patient.opd_patient_details') }}</h4>
    </div>
    <div class="col-lg-12">
        <ul class="nav nav-tabs mt-2" id="OPDtab">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab"
                   href="#opdVisits">{{ __('messages.opd_patient.visits') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#opdDiagnosis">{{ __('messages.ipd_diagnosis') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#opdTimelines">{{ __('messages.ipd_timelines') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="opdVisits">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('opd.patient.create').'?revisit='.$opdPatientDepartment->id }}"
                           class="btn btn-primary filter-container__btn float-right mb-3">
                            {{ __('messages.opd_patient.revisits') }}
                        </a>
                    </div>
                    <div class="col-lg-12">
                        @include('opd_patient_departments.visited_table')
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="opdDiagnosis">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" class="btn btn-primary filter-container__btn float-right mb-3" data-toggle="modal"
                           data-target="#addModal">
                            {{ __('messages.ipd_patient_diagnosis.new_ipd_diagnosis') }}
                        </a>
                    </div>
                    <div class="col-lg-12">
                        @include('opd_diagnoses.table')
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="opdTimelines">
                <div class="container-fluid">
                    <div class="row">
                        <div id="opdTimelines"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
