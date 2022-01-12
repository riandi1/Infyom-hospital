<div class="row view-spacer">
    <!-- Patient Id Field -->
    <div class="form-group col-md-3">
        {{ Form::label('patient_id', __('messages.case.patient').':', ['class' => 'font-weight-bold']) }}
        <p>{{ $patientAdmission->patient->user->full_name }}</p>
    </div>

    <!-- Doctor Name Field -->
    <div class="form-group col-md-3">
        {{ Form::label('doctor_id', __('messages.case.doctor').':', ['class' => 'font-weight-bold']) }}
        <p>{{ $patientAdmission->doctor->user->full_name }}</p>
    </div>

    <!-- Admission ID Field -->
    <div class="form-group col-md-3">
        {{ Form::label('admission_id', __('messages.bill.admission_id').':', ['class' => 'font-weight-bold']) }}
        <p>{{ $patientAdmission->patient_admission_id }}</p>
    </div>

    <!-- Admission Date Field -->
    <div class="form-group col-md-3">
        {{ Form::label('admission_date', __('messages.patient_admission.admission_date').':', ['class' => 'font-weight-bold']) }}
        <p>{{ \Carbon\Carbon::parse($patientAdmission->admission_date)->format('jS M, Y g:i A') }}</p>
    </div>

    <!-- Discharge Date Field -->
    <div class="form-group col-md-3">
        {{ Form::label('discharge_date', __('messages.patient_admission.discharge_date').':', ['class' => 'font-weight-bold']) }}
        <p>{{ !empty($patientAdmission->discharge_date)?date('jS M, Y g:i A', strtotime($patientAdmission->discharge_date)):'N/A' }}</p>
    </div>

    <!-- Package Id Field -->
    <div class="form-group col-md-3">
        {{ Form::label('package_id', __('messages.patient_admission.package').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->package_id))?$patientAdmission->package->name:__('messages.common.n/a') }}</p>
    </div>

    <!-- Insurance Id Field -->
    <div class="form-group col-md-3">
        {{ Form::label('insurance_id', __('messages.patient_admission.insurance').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->insurance_id))?$patientAdmission->insurance->name:__('messages.common.n/a') }}</p>
    </div>

    <!-- Bed Id Field -->
    <div class="form-group col-md-3">
        {{ Form::label('bed_id', __('messages.patient_admission.bed').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->bed_id))?$patientAdmission->bed->name:__('messages.common.n/a') }}</p>
    </div>

    <!-- Policy No Field -->
    <div class="form-group col-md-3">
        {{ Form::label('policy_no', __('messages.patient_admission.policy_no').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->policy_no))?$patientAdmission->policy_no:__('messages.common.n/a') }}</p>
    </div>

    <!-- Agent Name Field -->
    <div class="form-group col-md-3">
        {{ Form::label('agent_name', __('messages.patient_admission.agent_name').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->agent_name))?$patientAdmission->agent_name:__('messages.common.n/a') }}</p>
    </div>

    <!-- Guardian Name Field -->
    <div class="form-group col-md-3">
        {{ Form::label('guardian_name', __('messages.patient_admission.guardian_name').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->guardian_name))?$patientAdmission->guardian_name:__('messages.common.n/a') }}</p>
    </div>

    <!-- Guardian Relation Field -->
    <div class="form-group col-md-3">
        {{ Form::label('guardian_relation', __('messages.patient_admission.guardian_relation').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->guardian_relation))?$patientAdmission->guardian_relation:__('messages.common.n/a') }}</p>
    </div>

    <!-- Guardian Contact Field -->
    <div class="form-group col-md-3">
        {{ Form::label('guardian_contact', __('messages.patient_admission.guardian_contact').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->guardian_contact))?$patientAdmission->guardian_contact:__('messages.common.n/a') }}</p>
    </div>

    <!-- Guardian Address Field -->
    <div class="form-group col-md-3">
        {{ Form::label('guardian_address', __('messages.patient_admission.guardian_address').':', ['class' => 'font-weight-bold']) }}
        <p>{{ (!empty($patientAdmission->guardian_address))?$patientAdmission->guardian_address:__('messages.common.n/a') }}</p>
    </div>

    <div class="form-group col-md-3">
        {{ Form::label('status', __('messages.common.status').':', ['class' => 'font-weight-bold']) }}
        <p>{{ ($patientAdmission->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-md-3">
        {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($patientAdmission->created_at)) }}">{{ $patientAdmission->created_at->diffForHumans() }}</span>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-md-3">
        {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}<br>
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($patientAdmission->updated_at)) }}">{{ $patientAdmission->updated_at->diffForHumans() }}</span>
    </div>
</div>
