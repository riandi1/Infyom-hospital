<div class="row">
    <div class="form-group col-md-3">
        {{ Form::label('patient_id', 'Patient'.':') }}<label
                class="required">*</label>
        {{ Form::select('patient_id', $patients, isset($patientDiagnosisTest)?$patientDiagnosisTest->patient_id:null, ['class' => 'form-control','required','id' => 'patient_id','placeholder'=>'Select Patient']) }}
    </div>

    @if(Auth::user()->hasRole('Doctor'))
        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
    @else
        <div class="form-group col-md-3">
            {{ Form::label('doctor_id', 'Doctor'.':') }}<label
                    class="required">*</label>
            {{ Form::select('doctor_id', $doctors, isset($patientDiagnosisTest)?$patientDiagnosisTest->doctor_id:null, ['class' => 'form-control','required','id' => 'doctor_id','placeholder'=>'Select Doctor']) }}
        </div>
    @endif

    <div class="form-group col-md-3">
        {{ Form::label('category_id', 'Diagnosis Category'.':') }}<label
                class="required">*</label>
        {{ Form::select('category_id', $diagnosisCategory, isset($patientDiagnosisTest)?$patientDiagnosisTest->category_id:null, ['class' => 'form-control','required','id' => 'category_id','placeholder'=>'Select Diagnosis Category']) }}
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('report_number', 'Report Number'.':') }}
            {{ Form::text('report_number', isset($patientDiagnosisTest)?$patientDiagnosisTest->report_number:$reportNumber, ['class' => 'form-control','required','readonly']) }}
        </div>
    </div>

    @if(isset($patientDiagnosisTests))
        @foreach($patientDiagnosisTests as $patientDiagnosisTest)
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label($patientDiagnosisTest->property_name, str_replace("_"," ",Str::title($patientDiagnosisTest->property_name)) .':') }}
                    @if($patientDiagnosisTest->property_name == 'height')
                        {{ Form::number($patientDiagnosisTest->property_name, $patientDiagnosisTest->property_value, ['class' => 'form-control floatNumber', 'max' => '7', 'step' => '.01']) }}
                    @elseif($patientDiagnosisTest->property_name == 'weight')
                        {{ Form::number($patientDiagnosisTest->property_name, $patientDiagnosisTest->property_value, ['class' => 'form-control', 'max' => '200', 'step' => '.01', 'data-mask'=>'##0,00']) }}
                    @elseif($patientDiagnosisTest->property_name == 'age')
                        {{ Form::text($patientDiagnosisTest->property_name, $patientDiagnosisTest->property_value, ['class' => 'form-control','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                    @else
                        {{ Form::text($patientDiagnosisTest->property_name, $patientDiagnosisTest->property_value, ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
        @endforeach
    @endif
    <hr>
    <div class="col-sm-12 mt-3">
        <div class="mb-3 h5">
            {{__('messages.patient_diagnosis_test.add_other_diagnosis_property')}}
        </div>
        <table class="table table-bordered table-responsive-sm" id="patientDiagnosisTestTbl">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th class="diagnoses-filed">{{__('messages.patient_diagnosis_test.diagnosis_property_name')}}
                </th>
                <th class="diagnoses-filed">{{__('messages.patient_diagnosis_test.diagnosis_property_value')}}
                </th>
                <th>
                    <button type="button" class="btn btn-sm btn-primary float-right w-100"
                            id="addItem">{{ __('messages.common.add') }}</button>
                </th>
            </tr>
            </thead>
            <tbody class="diagnosis-item-container">
            </tbody>
        </table>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary','id'=>'saveBtn']) }}
        <a href="{{ route('patient.diagnosis.test.index') }}"
           class="btn btn-secondary">{{__('messages.common.cancel')}}</a>
    </div>
</div>
