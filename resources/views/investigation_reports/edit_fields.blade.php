<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('title', __('messages.investigation_report.title').(':')) }}<label
                    class="required">*</label>
            {{ Form::text('title', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.investigation_report.patient').(':')) }}<label
                    class="required">*</label>
            {{ Form::select('patient_id',$patients, null, ['class' => 'form-control','required','id' => 'patientId','placeholder'=>'Select Patient']) }}
        </div>
    </div>
    @if(Auth::user()->hasRole('Doctor'))
        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
    @else
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('doctor_id', __('messages.investigation_report.doctor').(':')) }}<label
                        class="required">*</label>
                {{ Form::select('doctor_id',$doctors, null, ['class' => 'form-control','required','id' => 'doctorId','placeholder'=>'Select Doctor']) }}
            </div>
        </div>
    @endif
    <div class="col-md-3">
        <div class="form-group investigation-report-date">
            {{ Form::label('date', __('messages.investigation_report.date').(':')) }}<label class="required">*</label>
            {{ Form::text('date', null, ['class' => 'form-control','id' => 'date','required','autocomplete' => 'off']) }}
        </div>
    </div>
    <div class="form-group col-md-3">
        <div class="row">
            <div class="col-sm-6 col-6">
                {{ Form::label('attachment', __('messages.investigation_report.attachment').(':')) }}
                <label class="image__file-upload"> {{ __('messages.common.choose') }}
                    {{ Form::file('attachment',['id'=>'attachment','class' => 'd-none']) }}
                </label>
                @if($investigationReport->attachment_url)
                    <a href="{{$investigationReport->attachment_url}}"
                       target="_blank">{{ __('messages.common.view') }}</a>
                @endif
            </div>
            <div class="col-sm-6 col-6 preview-image-video-container pl-0 mt-1">
                <img id='previewImage' class="img-thumbnail thumbnail-preview image-stretching"
                     src=" @if($fileExt=='pdf')
                     {{asset('assets/img/pdf.png')}}
                     @elseif($fileExt=='doc' || $fileExt=='docx')
                     {{asset('assets/img/doc.png')}}
                     @else
                     {{ empty($investigationReport->attachment_url)?asset('assets/img/default_image.jpg'):$investigationReport->attachment_url }}
                     @endif
                             "/>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').(':')) }}<span class="required">*</span>
            {{ Form::select('status', $status, null, ['id' => 'status','class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.investigation_report.description').(':')) }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
        <a href="{{ route('investigation-reports.index') }}"
           class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
