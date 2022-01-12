<div class="row">
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('sr_no', __('messages.employee_payroll.sr_no').(':')) }}<span class="required">*</span>
            {{ Form::text('sr_no', null, ['class' => 'form-control','required','readonly']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            @php $currentLang = app()->getLocale() @endphp
            {{ Form::label('payroll_id', __('messages.employee_payroll.payroll_id').(':'),['class' => $currentLang == 'ru' ? 'label-display' : '']) }}
            <span
                    class="required">*</span>
            {{ Form::text('payroll_id', null, ['class' => 'form-control','required','readonly']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('type', __('messages.employee_payroll.role').(':')) }}<span class="required">*</span>
            {{ Form::select('type', $types, $employeePayroll->type, ['id' => 'type','class' => 'form-control','required','placeholder' => 'Select Role']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('owner_id', __('messages.employee_payroll.employee').(':')) }}<span
                    class="required">*</span>
            {{ Form::select('owner_id', [null], $employeePayroll->owner->id, ['id' => 'ownerType','class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('month', __('messages.employee_payroll.month').(':')) }}<span class="required">*</span>
            {{ Form::selectMonth('month', $employeePayroll->month, ['id' => 'month','class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('year', __('messages.employee_payroll.year').(':')) }}<span class="required">*</span>
            {{ Form::text('year', null, ['class' => 'form-control','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '4','required']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').(':')) }}<span class="required">*</span>
            {{ Form::select('status', $status, null, ['id' => 'status','class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('basic_salary', __('messages.employee_payroll.basic_salary').(':')) }}<span
                    class="required">*</span>
            {{ Form::text('basic_salary', null, ['id' => 'basicSalary','class' => 'form-control price-input','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '7','required']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('allowance', __('messages.employee_payroll.allowance').(':')) }}<span
                    class="required">*</span>
            {{ Form::text('allowance', null, ['id' => 'allowance','class' => 'form-control price-input','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '5','required']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('deductions', __('messages.employee_payroll.deductions').(':')) }}<span
                    class="required">*</span>
            {{ Form::text('deductions', null, ['id' => 'deductions','class' => 'form-control price-input','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '5','required']) }}
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('net_salary', __('messages.employee_payroll.net_salary').(':')) }}<span
                    class="required">*</span>
            {{ Form::text('net_salary', null, ['id' => 'netSalary','class' => 'form-control price-input','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '7','required','readonly']) }}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id' => 'btnSave']) }}
        <a href="{{ route('employee-payrolls.index') }}"
           class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
