<div class="alert alert-danger d-none" id="validationErrorsBox"></div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('Name',__('messages.call_log.name').':') }}<span
            class="text-danger">*</span>
        {{ Form::text('name', null, ['class' => 'form-control','required']) }}
    </div>
    <div class="form-group col-sm-6 myclass">
        {{ Form::label('Phone',__('messages.call_log.phone').':') }}
        {!! Form::tel('phone', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
        {!! Form::hidden('prefix_code',null,['id'=>'prefix_code']) !!}
        <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
        <span id="error-msg" class="hide"></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('Date',__('messages.call_log.received_on').':') }}
        {{ Form::text('date', null, ['class' => 'form-control','autocomplete' => 'off','id' => 'date']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('Follow-Up Date',__('messages.call_log.follow_up_date').':') }}
        {{ Form::text('follow_up_date', null, ['class' => 'form-control','autocomplete' => 'off','id' => 'followUpDate']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('Note',__('messages.call_log.note').':') }}
        {{ Form::textarea('note', null, ['class' => 'form-control','rows' => 5,'cols' => 5]) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('Call Type',__('messages.call_log.call_type').':') }}
        <div>
            {{ Form::radio('call_type',\App\Models\CallLog::INCOMING, ['class' => 'form-control']) }} {{ __('messages.call_log.incoming') }}
            {{ Form::radio('call_type',\App\Models\CallLog::OUTCOMING, ['class' => 'form-control']) }} {{ __('messages.call_log.outgoing') }}
        </div>
    </div>
</div>
<div class="form-group col-sm-12 pl-0">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary','id' => 'btnSave']) !!}
    <a href="{!! route('call_logs.index') !!}" class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a>
</div>

