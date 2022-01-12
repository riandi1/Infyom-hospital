<div class="row">
    <div class="form-group col-sm-12 my-0">
        <a href="javascript:void(0)" class="btn btn-sm btn-success float-right printPrescription">
            <i class="fas fa fa-print"></i> {{ __('messages.ipd_patient_prescription.print_prescription') }}
        </a>
    </div>
</div>
<hr>
<div id='DivIdToPrint'>
    <div class="row">
        <div class="form-group col-sm-12 my-0">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('default-images/logo.png') }}" class="w-75 py-3" alt="product-image"/>
                </div>
                <div class="col-md-10 text-right">
                    <p class="my-0 py-0"><b>{{ __('messages.common.address') }}</b>
                        : {{ getSettingValue('hospital_address') }}</p>
                    <p class="my-0 py-0"><b>{{ __('messages.user.phone') }}</b>
                        : {{ getSettingValue('hospital_phone') }}</p>
                    <p class="my-0 py-0"><b>{{ __('messages.user.email') }}</b>
                        : {{ getSettingValue('hospital_email') }}</p>
                    <p class="my-0 py-0"><b>{{ __('messages.common.created_on') }}</b>
                        : {{ date('jS M, Y H:i', strtotime($ipdPrescription->created_at)) }}</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-sm-12 my-0">
            <p class="my-0 py-0" id="ipdHeaderNoteData">
                {!! !empty($ipdPrescription->header_note) ? nl2br(e($ipdPrescription->header_note)) : __('messages.common.n/a') !!}
            </p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('ipd_number', __('messages.ipd_patient.ipd_number').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->ipd_number }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('patient_name', __('messages.bed_assign.patient_name').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->patient->user->full_name }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('email', __('messages.user.email').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->patient->user->email }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('phone', __('messages.user.phone').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->patient->user->phone != null ? $ipdPrescription->patient->patient->user->phone : __('messages.common.n/a') }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('gender', __('messages.user.gender').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->patient->user->gender == 0 ? __('messages.user.male') : __('messages.user.female') }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('age', __('messages.blood_donor.age').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->patient->user->age }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('admission_date', __('messages.ipd_patient.admission_date').':', ['class' => 'font-weight-bold']) }}
            <p>{{ date('jS M, Y H:i', strtotime($ipdPrescription->patient->admission_date)) }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('case_id', __('messages.case.case_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->patientCase->case_id }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('doctor_id', __('messages.ipd_patient.doctor_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->doctor->user->full_name }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('height', __('messages.ipd_patient.height').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->height != null ? $ipdPrescription->patient->height : __('messages.common.n/a') }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('weight', __('messages.ipd_patient.weight').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->weight != null ? $ipdPrescription->patient->weight : __('messages.common.n/a') }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('bp', __('messages.ipd_patient.bp').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->bp != null ? $ipdPrescription->patient->bp : __('messages.common.n/a') }}</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('symptoms', __('messages.ipd_patient.symptoms').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPrescription->patient->symptoms != null ? $ipdPrescription->patient->symptoms : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <hr class="py-0 my-0 mb-3">

    <div class="table-responsive">
        <table class="table table-responsive-sm table-striped table-bordered">
            <thead>
            <th>{{ __('messages.ipd_patient_prescription.category_id') }}</th>
            <th>{{ __('messages.ipd_patient_prescription.medicine_id') }}</th>
            <th>{{ __('messages.ipd_patient_prescription.dosage') }}</th>
            <th>{{ __('messages.ipd_patient_prescription.instruction') }}</th>
            </thead>
            <tbody>
            @foreach($ipdPrescription->ipdPrescriptionItems as $ipdPrescriptionItem)
                <tr>
                    <td>
                        {{ $ipdPrescriptionItem->medicineCategory->name }} - {{$loop->iteration}}
                    </td>
                    <td>
                        {{ $ipdPrescriptionItem->medicine->name }}
                    </td>
                    <td>
                        {{ $ipdPrescriptionItem->dosage }}
                    </td>
                    <td>
                        {!! !empty($ipdPrescriptionItem->instruction) ? nl2br(e($ipdPrescriptionItem->instruction)) : __('messages.common.n/a') !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <hr class="py-0 my-0 mb-3">
    <div class="row">
        <div class="form-group col-sm-12 my-0">
            <p class="my-0 py-0" id="ipdFooterNoteData">
                {!! !empty($ipdPrescription->footer_note) ? nl2br(e($ipdPrescription->footer_note)) : __('messages.common.n/a') !!}
            </p>
        </div>
    </div>
    <hr>
</div>
