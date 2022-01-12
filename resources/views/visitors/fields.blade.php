<div class="alert alert-danger display-none" id="visitorValidationErrorsBox"></div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('Name',__('messages.visitor.purpose').':') }}<span
                class="text-danger">*</span>
        {{ Form::select('purpose', $purpose, null, ['class' => 'form-control', 'id' => 'purpose','placeholder' => 'Select Purpose']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('Name',__('messages.visitor.name').':') }}<span
                class="text-danger">*</span>
        {{ Form::text('name', null, ['class' => 'form-control','required']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6 myclass">
        {{ Form::label('Phone',__('messages.visitor.phone').':') }}
        {!! Form::tel('phone', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
        {!! Form::hidden('prefix_code',null,['id'=>'prefix_code']) !!}
        <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
        <span id="error-msg" class="hide"></span>
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('Id Card',__('messages.visitor.id_card').':') }}
        {{ Form::text('id_card', null, ['class' => 'form-control','id' => 'id_card']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('Number Of Person',__('messages.visitor.number_of_person').':') }}
        {{ Form::number('no_of_person', null, ['class' => 'form-control','id' => 'no_of_person','min'=>'1']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('Date',__('messages.visitor.date').':') }}
        {{ Form::text('date', null, ['class' => 'form-control','autocomplete' => 'off','id' => 'date']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('In Time',__('messages.visitor.in_time').':') }}
        {{ Form::text('in_time', null, ['class' => 'form-control','id' => 'inTime']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('Out Time',__('messages.visitor.out_time').':') }}
        {{ Form::text('out_time', null, ['class' => 'form-control','autocomplete' => 'off','id' => 'outTime']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('Note',__('messages.visitor.note').':') }}
        {{ Form::textarea('note', null, ['class' => 'form-control','autocomplete' => 'off','id' => 'note','rows' => 5,'cols' => 5]) }}
    </div>
    <div class="col-sm-6 col-md-3 col-lg-2 col-6">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    {{ Form::label('attachment', __('messages.expense.attachment').':') }}
                    <label class="image__file-upload"> {{__('messages.expense.choose')}}
                        {{ Form::file('attachment',['id' => 'attachment','class' => 'd-none document-file']) }}
                    </label>
                    @if($isEdit)
                        @if($visitor->document_url)
                            <a href="{{$visitor->document_url}}" target="_blank">{{__('messages.common.view')}}</a>
                        @endif
                    @endif
                </div>
                <div class="col-2 mt-2 ">
                    <img id='previewImage' class="img-thumbnail thumbnail-preview image-stretching"
                         src="
                    @if($isEdit)
                         @if($fileExt=='pdf')
                         {{asset('assets/img/pdf.png')}}
                         @elseif($fileExt=='doc' || $fileExt=='docx')
                         {{asset('assets/img/doc.png')}}
                         @else
                         {{ empty($visitor->document_url)?asset('assets/img/default_image.jpg'):$visitor->document_url }}
                         @endif
                         @else
                         {{ asset('assets/img/default_image.jpg') }}
                         @endif
                                 "/>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-sm-12 pl-0">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary','id' => 'btnSave']) !!}
    <a href="{!! route('visitors.index') !!}" class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a>
</div>
