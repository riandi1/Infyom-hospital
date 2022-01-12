<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.prescription.patient').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $prescription->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.case.doctor').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $prescription->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('food_allergies', __('messages.prescription.food_allergies').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->food_allergies != "") ? $prescription->food_allergies : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('tendency_bleed', __('messages.prescription.tendency_bleed').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->tendency_bleed != "") ? $prescription->tendency_bleed : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('heart_disease', __('messages.prescription.heart_disease').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->heart_disease != "") ? $prescription->heart_disease : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3 pr-0">
        <div class="form-group">
            {{ Form::label('high_blood_pressure', __('messages.prescription.high_blood_pressure').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->high_blood_pressure != "") ? $prescription->high_blood_pressure : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('diabetic', __('messages.prescription.diabetic').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->diabetic != "") ? $prescription->diabetic : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('surgery', __('messages.prescription.surgery').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->surgery != "") ? $prescription->surgery : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('accident', __('messages.prescription.accident').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->accident != "") ? $prescription->accident : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('others', __('messages.prescription.others').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->others != "") ? $prescription->others : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('medical_history', __('messages.prescription.medical_history').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->medical_history != "") ? $prescription->medical_history : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('current_medication', __('messages.prescription.current_medication').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->current_medication != "") ? $prescription->current_medication : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('female_pregnancy', __('messages.prescription.female_pregnancy').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->female_pregnancy != "") ? $prescription->female_pregnancy : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('breast_feeding', __('messages.prescription.breast_feeding').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->breast_feeding != "") ? $prescription->breast_feeding : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('health_insurance', __('messages.prescription.health_insurance').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->health_insurance != "") ? $prescription->health_insurance : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('low_income', __('messages.prescription.low_income').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->low_income != "") ? $prescription->low_income : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('reference', __('messages.prescription.reference').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->reference != "") ? $prescription->reference : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($prescription->status == 1) ? 'Active' : 'Deactive' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($prescription->created_at)) }}">{{ $prescription->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($prescription->updated_at)) }}">{{ $prescription->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
