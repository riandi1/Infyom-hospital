<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('sr_no', __('messages.employee_payroll.sr_no').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $employeePayroll->sr_no }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('payroll_id', __('messages.employee_payroll.payroll_id').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $employeePayroll->payroll_id }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('type', __('messages.employee_payroll.role').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $employeePayroll->type_string }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('employee', __('messages.employee_payroll.employee').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $employeePayroll->owner->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('month', __('messages.employee_payroll.month').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $employeePayroll->month }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('year', __('messages.employee_payroll.year').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $employeePayroll->year }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ ($employeePayroll->status == 0) ? 'Unpaid' : 'Paid' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('basic_salary', __('messages.employee_payroll.basic_salary').(':'), ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($employeePayroll->basic_salary, 2) }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('allowance', __('messages.employee_payroll.allowance').(':'), ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($employeePayroll->allowance, 2) }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('deductions', __('messages.employee_payroll.deductions').(':'), ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($employeePayroll->deductions, 2) }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('net_salary', __('messages.employee_payroll.net_salary').(':'), ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($employeePayroll->net_salary, 2) }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_on', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($employeePayroll->created_at)) }}">{{ $employeePayroll->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('last_updated', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($employeePayroll->updated_at)) }}">{{ $employeePayroll->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
