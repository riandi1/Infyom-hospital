<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.ipd_patient.patient_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPatientDepartment->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('case_id', __('messages.ipd_patient.case_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($ipdPatientDepartment->case_id) ? $ipdPatientDepartment->patientCase->case_id : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('ipd_number', __('messages.ipd_patient.ipd_number').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPatientDepartment->ipd_number }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('height', __('messages.ipd_patient.height').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($ipdPatientDepartment->height) ? $ipdPatientDepartment->height : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('weight', __('messages.ipd_patient.weight').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($ipdPatientDepartment->weight) ? $ipdPatientDepartment->weight : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bp', __('messages.ipd_patient.bp').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($ipdPatientDepartment->bp) ? $ipdPatientDepartment->bp : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('admission_date', __('messages.ipd_patient.admission_date').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ \Carbon\Carbon::parse($ipdPatientDepartment->admission_date)->diffForHumans() }}">{{ date('jS M, Y', strtotime($ipdPatientDepartment->admission_date)) }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.ipd_patient.doctor_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPatientDepartment->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bed_type_id', __('messages.ipd_patient.bed_type_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPatientDepartment->bedType->title }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bed_id', __('messages.ipd_patient.bed_id').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $ipdPatientDepartment->bed->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('is_old_patient', __('messages.ipd_patient.is_old_patient').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($ipdPatientDepartment->is_old_patient) ? __('messages.common.yes') : __('messages.common.no') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($ipdPatientDepartment->created_at)) }}">{{ $ipdPatientDepartment->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($ipdPatientDepartment->updated_at)) }}">{{ $ipdPatientDepartment->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('symptoms', __('messages.ipd_patient.symptoms').':', ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($ipdPatientDepartment->symptoms)?nl2br(e($ipdPatientDepartment->symptoms)) : __('messages.common.n/a') !!}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('notes', __('messages.ipd_patient.notes').':', ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($ipdPatientDepartment->notes)?nl2br(e($ipdPatientDepartment->notes)) : __('messages.common.n/a') !!}</p>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.ipd_patient.ipd_patient_details') }}</h4>
    </div>
    <div class="col-lg-12">
        <ul class="nav nav-tabs mt-2">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#ipdDiagnosis">{{ __('messages.ipd_diagnosis') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#ipdConsultantInstruction">{{ __('messages.ipd_consultant_register') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#ipdCharges">{{ __('messages.ipd_charges') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#ipdPrescriptions">{{ __('messages.ipd_prescription') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#ipdTimelines">{{ __('messages.ipd_timelines') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#ipdPayment">{{ __('messages.account.payments') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#ipdBills">{{ __('messages.bill.bills') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="ipdDiagnosis">
                <div class="row">
                    <div class="col-lg-12">
                        @include('ipd_patient_list.ipd_listing_tables.ipd_diagnosis_table')
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="ipdConsultantInstruction">
                <div class="row">
                    <div class="col-lg-12">
                        @include('ipd_patient_list.ipd_listing_tables.ipd_consultant_table')
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="ipdCharges">
                <div class="row">
                    <div class="col-lg-12">
                        @include('ipd_patient_list.ipd_listing_tables.ipd_charges_table')
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="ipdPrescriptions">
                <div class="row">
                    <div class="col-lg-12">
                        @include('ipd_patient_list.ipd_listing_tables.ipd_prescriptions_table')
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="ipdTimelines">
                <div class="container-fluid">
                    <div class="row">
                        <div id="ipdTimelines"></div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="ipdPayment">
                <div class="row">
                    <div class="col-lg-12">
                        @if($ipdPatientDepartment->bill && $bill['patient_net_payable_amount'] > 0)
                            <button id="ipdPaymentBtn" class="btn btn-primary filter-container__btn float-right mb-3">
                                {{ __('messages.ipd_payments.make_payment') }}
                            </button>
                            <input type="hidden" name="net_payable_amount" id="billAmout"
                                   value="{{ $bill['patient_net_payable_amount'] }}"/>
                            <input type="hidden" name="ipd_number" id="ipdNumber"
                                   value="{{$ipdPatientDepartment->ipd_number }}"/>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        @include('ipd_patient_list.ipd_listing_tables.ipd_payment_table')
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="ipdBills">
                @include('ipd_patient_list.ipd_listing_tables.ipd_bills_table')
            </div>
        </div>
    </div>
</div>
