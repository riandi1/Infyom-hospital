<div class="row view-spacer">
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('patient_id', __('messages.case.patient').(':'), ['class'=>'font-weight-bold']) }}
            <p>{{ $bill->patient->user->full_name }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('bill_id', __('messages.bill.bill_id').(':'), ['class'=>'font-weight-bold']) }}
            <p>{{ $bill->bill_id }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('bill_date', __('messages.bill.bill_date').(':'), ['class'=>'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($bill->bill_date)->format('jS M, Y g:i A') }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('patient_admission_id', __('messages.bill.admission_id').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $bill->patientAdmission->patient_admission_id }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('email', __('messages.bill.patient_email').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ !empty($bill->patient->user->email)?$bill->patient->user->email:'N/A' }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('phone', __('messages.bill.patient_cell_no').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ !empty($bill->patient->user->phone) ? $bill->patient->user->phone : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('gender', __('messages.bill.patient_gender').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ ($bill->patient->user->gender) ? __('messages.user.female') : __('messages.user.male') }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('dob', __('messages.bill.patient_dob').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ (!empty($bill->patient->user->dob)) ? \Carbon\Carbon::parse($bill->patient->user->dob)->format('jS M, Y') : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('doctor_id', __('messages.case.doctor').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $bill->patientAdmission->doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('admission_date', __('messages.bill.admission_date').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($bill->patientAdmission->admission_date)->format('jS M, Y g:i A') }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('discharge_date', __('messages.bill.discharge_date').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ !empty($bill->patientAdmission->discharge_date)?date('jS M, Y g:i A', strtotime($bill->patientAdmission->discharge_date)):'N/A' }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('package_id', __('messages.bill.package_name').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ !empty($bill->patientAdmission->package->name)?$bill->patientAdmission->package->name:'N/A' }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('insurance_id', __('messages.bill.insurance_name').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ !empty($bill->patientAdmission->insurance->name)?$bill->patientAdmission->insurance->name:'N/A' }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('total_days', __('messages.bill.total_days').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $bill->totalDays }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('policy_no', __('messages.bill.policy_no').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ !empty($bill->patientAdmission->policy_no) ? $bill->patientAdmission->policy_no : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($bill->created_at)) }}">{{ $bill->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($bill->updated_at)) }}">{{ $bill->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>

<div class="com-sm-12 ">
    <div class="table-responsive-sm">
        <table class="table table-bordered min-w-600">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th>{{ __('messages.bill.item_name') }}</th>
                <th class="text-right">{{ __('messages.bill.qty') }}</th>
                <th class="text-right">{{ __('messages.bill.price') }}</th>
                <th class="text-right">{{ __('messages.bill.amount') }}</th>
            </tr>
            </thead>
            <tbody class="bill-item-container">
            @foreach($bill->billItems as $index => $billItem)
                <tr>
                    <td class="text-center w-5">{{ $index + 1 }}</td>
                    <td>
                        {{ $billItem->item_name }}
                    </td>
                    <td class="table__qty text-right">
                        {{ $billItem->qty }}
                    </td>
                    <td class="text-right">
                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($billItem->price) }}
                    </td>
                    <td class="text-right"><b>{{ getCurrencySymbol() }}</b> {{ number_format($billItem->amount) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-12 text-right p-0 font-weight-bold">
        {{ Form::label('total', __('messages.bill.total_amount').(':')) }}
        (<b>{{ getCurrencySymbol() }}</b>)
        {{ number_format($bill->amount,2) }}
    </div>
</div>
