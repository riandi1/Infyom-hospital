<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', __('messages.medicine.brand').':' ) !!}<span class="required">*</span>
            {!! Form::text('name', null, ['id'=>'name','class' => 'form-control','required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('phone', __('messages.user.phone').':') !!} <br>
            {!! Form::tel('phone', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
            {!! Form::hidden('prefix_code',null,['id'=>'prefix_code']) !!}
            <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
            <span id="error-msg" class="hide"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', __('messages.user.email').':') !!}
            {!! Form::text('email', null, ['id'=>'email','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'btnSave']) }}
        <a href="{!! route('brands.index') !!}" class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a>
    </div>
</div>
