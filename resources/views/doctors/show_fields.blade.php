<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('name', __('messages.case.doctor').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctorData->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('email', __('messages.user.email').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctorData->user->email }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone', __('messages.user.phone').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($doctorData->user->phone)?($doctorData->user->phone):'N/A' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('designation', __('messages.user.designation').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctorData->user->designation }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('department', __('messages.appointment.doctor_department').':', ['class' => 'font-weight-bold']) }}
            <p>{{ getDoctorDepartment($doctorData->doctor_department_id) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('qualification', __('messages.user.qualification').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctorData->user->qualification }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('blood_group', __('messages.user.blood_group').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($doctorData->user->blood_group) ? $doctorData->user->blood_group : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('dob', __('messages.user.dob').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($doctorData->user->dob) ? \Carbon\Carbon::parse($doctorData->user->dob)->format('jS M, Y') : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('specialist', __('messages.doctor.specialist').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctorData->specialist }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('gender', __('messages.user.gender').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctorData->user->gender == 0 ? __('messages.user.male') : __('messages.user.female') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($doctorData->user->status === 1) ? 'Active' : 'Deactive' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($doctorData->created_at)) }}">{{ $doctorData->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($doctorData->updated_at)) }}">{{ $doctorData->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
@if(!empty($doctorData->address))
    <hr>
    <div class="row mt-3">
        <div class="col-md-12 mb-3">
            <h5>{{ __('messages.user.address_details') }}</h5>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('address1', __('messages.user.address1').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($doctorData->address->address1) ? $doctorData->address->address1 : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('address2', __('messages.user.address2').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($doctorData->address->address2) ? $doctorData->address->address2 : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('city', __('messages.user.city').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($doctorData->address->city) ? $doctorData->address->city : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('zip', __('messages.user.zip').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($doctorData->address->zip) ? $doctorData->address->zip : __('messages.common.n/a') }}</p>
            </div>
        </div>
    </div>
@endif
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.doctor.doctor_details') }}</h4>
    </div>
    <div class="col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs mt-2">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#dcases">{{ __('messages.cases') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dpatients">{{ __('messages.patients') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dappointments">{{ __('messages.appointments') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dschedules">{{ __('messages.schedules') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dpayroll">{{ __('messages.my_payroll.my_payrolls') }}</a>
            </li>
        </ul>

        <div class="tab-content">
            {{-- Doctor Cases --}}
            <div class="tab-pane active" id="dcases">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="doctorCases"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-5 text-center">{{ __('messages.case.case_id') }}</th>
                                    <th class="w-10">{{ __('messages.case.patient') }}</th>
                                    <th class="w-25">{{ __('messages.case.description') }}</th>
                                    <th class="w-10">{{ __('messages.case.phone') }}</th>
                                    <th class="w-15">{{ __('messages.case.case_date') }}</th>
                                    <th class="w-5 text-right">{{ __('messages.case.fee') }}</th>
                                    <th class="w-5 text-center">{{ __('messages.common.status') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctorData->cases as $case)
                                    <tr>
                                        <td class="text-center">{{ $case->case_id }}</td>
                                        <td>
                                            <a href="{{ url('patients',$case->patient->id) }}">{{ $case->patient->user->full_name }}</a>
                                        </td>
                                        <td class="text-truncate"
                                            style="max-width: 150px">{!! (!empty($case->description)) ? nl2br(e($case->description)) : __('messages.common.n/a') !!}</td>
                                        <td>{{ (!empty($case->phone)) ? $case->phone : __('messages.common.n/a') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($case->date)->format('jS M, Y g:i A') }}</td>
                                        <td class="text-right">
                                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($case->fee, 2) }}
                                        </td>
                                        <td class="text-center">{{ ($case->status) ? __('messages.common.active') : __('messages.common.de_active') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Doctor Patients --}}
            <div class="tab-pane fade" id="dpatients">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="doctorPatients"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10">{{ __('messages.case.patient') }}</th>
                                    <th class="w-10">{{ __('messages.user.email') }}</th>
                                    <th class="w-10">{{ __('messages.user.phone') }}</th>
                                    <th class="w-5">{{ __('messages.user.blood_group') }}</th>
                                    <th class="w-10 text-center">{{ __('messages.common.status') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctorData->patients as $patient)
                                    <tr>
                                        <td>
                                            <a href="{{ url('patients',$patient->id) }}">{{ $patient->user->full_name }}</a>
                                        </td>
                                        <td>{{ $patient->user->email }}</td>
                                        <td>{{ (!empty($patient->user->phone)) ? $patient->user->phone : __('messages.common.n/a') }}</td>
                                        <td>{{ (!empty($patient->user->blood_group)) ? $patient->user->blood_group : __('messages.common.n/a') }}</td>
                                        <td class="text-center">{{ (!empty($patient->user->status)) ? __('messages.common.active') : __('messages.common.de_active') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Doctor Appointments --}}
            <div class="tab-pane fade" id="dappointments">
                <div class="row">
                    <div class="col-lg-12">
                        <div class=" viewList">
                            <table id="doctorAppointments"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10">{{ __('messages.appointment.patient') }}</th>
                                    <th class="w-10">{{ __('messages.appointment.doctor') }}</th>
                                    <th class="w-10">{{ __('messages.appointment.doctor_department') }}</th>
                                    <th class="w-10">{{ __('messages.appointment.date') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>
                                            <a href="{{ url('patients',$appointment->patient_id) }}">{{ $appointment->patient->user->full_name }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('doctors',$appointment->doctor_id) }}">{{ $appointment->doctor->user->full_name }}</a>
                                        </td>
                                        <td>{{ $appointment->department->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->opd_date)->format('jS M, Y h:i A') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Doctor Schedules --}}
            <div class="tab-pane fade" id="dschedules">
                <div class="row">
                    <div class="col-lg-12">
                        <div class=" viewList">
                            <table id="doctorSchedules"
                                   class="display table table-responsive-sm  table-striped table-bordered d-table-con">
                                <thead>
                                <tr>
                                    <th class="w-20">{{ __('messages.schedule.available_on') }}</th>
                                    <th class="w-40">{{ __('messages.schedule.available_from') }}</th>
                                    <th class="w-40">{{ __('messages.schedule.available_to') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctorData->schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->available_on }}</td>
                                        <td>{{ $schedule->available_from }}</td>
                                        <td>{{ $schedule->available_to }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Doctor Payrolls --}}
            <div class="tab-pane fade" id="dpayroll">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="doctorPayrolls"
                                   class="display table table-responsive-sm table-striped table-bordered">
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
                                @foreach($doctorData->payrolls as $payroll)
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
            </div>
        </div>
    </div>
</div>
