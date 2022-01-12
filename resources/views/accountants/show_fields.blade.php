<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('full_name',__('messages.user.name').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $accountant->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('email',__('messages.user.email').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $accountant->user->email }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone',__('messages.user.phone').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($accountant->user->phone)?$accountant->user->phone:'N/A' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('gender',__('messages.user.gender').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $accountant->user->gender == 0 ? 'Male' : 'Female' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('blood_group',__('messages.user.blood_group').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($accountant->user->blood_group) ? $accountant->user->blood_group : __('messages.common.n/a')}}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('dob', __('messages.user.dob').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($accountant->user->dob) ? \Carbon\Carbon::parse($accountant->user->dob)->format('jS M, Y') : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('designation',__('messages.user.designation').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($accountant->user->designation) ? $accountant->user->designation : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('designation',__('messages.user.qualification').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($accountant->user->qualification) ? $accountant->user->qualification : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status',__('messages.common.status').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ ($accountant->user->status === 1) ? 'Active' : 'Deactive' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at',__('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($accountant->created_at)) }}">{{ $accountant->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at',__('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($accountant->updated_at)) }}">{{ $accountant->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
@if(!empty($accountant->address))
    <hr>
    <div class="row mt-3">
        <div class="col-md-12 mb-3">
            <h5>{{ __('messages.user.address_details') }}</h5>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('address1', __('messages.user.address1').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($accountant->address->address1) ? $accountant->address->address1 : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('address2', __('messages.user.address2').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($accountant->address->address2) ? $accountant->address->address2 : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('city', __('messages.user.city').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($accountant->address->city) ? $accountant->address->city : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('zip', __('messages.user.zip').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($accountant->address->zip) ? $accountant->address->zip : __('messages.common.n/a') }}</p>
            </div>
        </div>
    </div>
@endif
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.my_payroll.my_payrolls') }}</h4>
    </div>
    <div class="col-lg-12">
        <div class=" viewList">
            <table id="accountantPayrolls" class="display table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th class="w-10 text-center">{{ __('messages.employee_payroll.payroll_id') }}</th>
                    <th class="w-10">{{ __('messages.employee_payroll.month') }}</th>
                    <th class="w-10">{{ __('messages.employee_payroll.year') }}</th>
                    <th class="w-10 text-right">{{ __('messages.employee_payroll.basic_salary') }}</th>
                    <th class="w-10 text-right">{{ __('messages.employee_payroll.allowance') }}</th>
                    <th class="w-10 text-right">{{ __('messages.employee_payroll.deductions') }}</th>
                    <th class="w-10 text-right">{{ __('messages.employee_payroll.net_salary') }}</th>
                    <th class="w-10 text-center">{{ __('messages.common.status') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payrolls as $payroll)
                    <tr>
                        <td class="text-center">{{ $payroll->payroll_id }}</td>
                        <td>{{ $payroll->month }}</td>
                        <td>{{ $payroll->year }}</td>
                        <td class="text-right">
                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->basic_salary, 2) }}
                        </td>
                        <td class="text-right">
                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->allowance, 2) }}
                        </td>
                        <td class="text-right">
                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->deductions, 2) }}
                        </td>
                        <td class="text-right">
                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->net_salary, 2) }}
                        </td>
                        <td class="text-center">{{ ($payroll->status) ? __('messages.employee_payroll.paid') : __('messages.employee_payroll.not_paid') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
