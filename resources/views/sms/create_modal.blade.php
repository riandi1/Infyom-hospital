<div id="AddModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('messages.sms.new_sms')}}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {!! Form::open(['id'=>'addNewForm']) !!}
            <div class="modal-body">
                <div class="alert alert-danger" id="validationErrorsBox" style="display: none"></div>
                <div class="row">
                    <div class="form-group col-sm-12 d-flex flex-row-reverse">
                        <div class="custom-control custom-checkbox ml-2">
                            <label class="switch switch-label switch-outline-primary-alt swich-center pt-1">
                                <input name="number" class="switch-input number" type="checkbox" value="0">
                                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
                            </label>&nbsp;
                            {{ Form::label('number',  __('messages.sms.send_sms_by_number_directly')) }}
                        </div>
                    </div>
                    <div class="form-group col-sm-12 myclass">
                        {{ Form::label('Phone',__('messages.sms.phone_number').':') }}<span
                                class="required">*</span>
                        {!! Form::tel('phone', null, ['class' => 'form-control', 'required','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
                        {!! Form::hidden('prefix_code',null,['id'=>'prefix_code']) !!}
                        <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
                        <span id="error-msg" class="hide"></span>
                    </div>
                    <div class="form-group col-sm-12 role">
                        {{ Form::label('role', __('messages.sms.role').':') }}<span
                                class="required">*</span>
                        {{ Form::select('role', $roles, null, ['class' => 'form-control', 'required', 'id'=>'roleId','placeholder' => 'Select Role']) }}
                    </div>
                    <div class="form-group col-sm-12 send">
                        {{ Form::label('send_to', __('messages.sms.send_to').':') }}<span
                                class="required">* </span><span><strong>{{__('messages.sms.only_user_with_registered_phone_will_display')}}</strong></span>
                        {{ Form::select('send_to[]', [null], null, ['class' => 'form-control', 'required', 'id'=>'userId', 'multiple' => true,'disabled']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('message', __('messages.sms.message').':') }}<span
                                class="required">*</span>
                        {!! Form::textarea('message', null, ['class' => 'form-control', 'id' => 'messageId', 'required', 'rows' => 6, 'maxlength'=>"160"]) !!}
                    </div>
                    <div class="text-right col-sm-12 mt-4">
                        {!! Form::button( __('messages.sms.send'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Sending..."]) !!}
                        <button type="button" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
