<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient_id', 'Patient'.':', ['class' => 'font-weight-bold']) }}
            <p>{{$patientDiagnosisTest->patient->user->full_name}}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_id', 'Doctor'.':', ['class' => 'font-weight-bold']) }}
            <p>{{$patientDiagnosisTest->doctor->user->full_name}}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('category_id','Diagnosis Category'.':', ['class' => 'font-weight-bold']) }}
            <p>{{$patientDiagnosisTest->category->name}}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('report_number', 'Report Number'.':', ['class' => 'font-weight-bold']) }}
            <p>{{$patientDiagnosisTest->report_number}}</p>
        </div>
    </div>

    @if(isset($patientDiagnosisTests))
        @foreach($patientDiagnosisTests as $patientDiagnosisTest)
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label($patientDiagnosisTest->property_name, str_replace("_"," ",Str::title($patientDiagnosisTest->property_name)).':', ['class' => 'font-weight-bold']) }}
                    <p>{{!empty($patientDiagnosisTest->property_value)?$patientDiagnosisTest->property_value:'N/A'}}</p>
                </div>
            </div>
        @endforeach
    @endif

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':',['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($patientDiagnosisTest->created_at)) }}">{{ $patientDiagnosisTest->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':',['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($patientDiagnosisTest->updated_at)) }}">{{ $patientDiagnosisTest->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
