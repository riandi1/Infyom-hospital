<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('full_name', __('messages.case.patient').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $data->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('email', __('messages.user.email').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $data->user->email }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone', __('messages.user.phone').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($data->user->phone)?$data->user->phone:__('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('gender', __('messages.user.gender').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($data->user->gender != 1) ? __('messages.user.male') : __('messages.user.female') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('blood_group', __('messages.user.blood_group').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($data->user->blood_group) ? $data->user->blood_group : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('dob', __('messages.user.dob').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($data->user->dob) ? \Carbon\Carbon::parse($data->user->dob)->format('jS M, Y') : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($data->user->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($data->created_at)) }}">{{ $data->user->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($data->updated_at)) }}">{{ $data->user->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
@if(!empty($data->address))
    <hr>
    <div class="row mt-3">
        <div class="col-md-12 mb-3">
            <h5>{{ __('messages.user.address_details') }}</h5>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('address1', __('messages.user.address1').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($data->address->address1) ? $data->address->address1 : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('address2', __('messages.user.address2').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($data->address->address2) ? $data->address->address2 : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('city', __('messages.user.city').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($data->address->city) ? $data->address->city : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('zip', __('messages.user.zip').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($data->address->zip) ? $data->address->zip : __('messages.common.n/a') }}</p>
            </div>
        </div>
    </div>
@endif
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.patient.patient_details') }}</h4>
    </div>
    <div class="col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs mt-2">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#pcases">{{ __('messages.cases') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#padmissions">{{ __('messages.patient_admissions') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pappointments">{{ __('messages.appointments') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pbills">{{ __('messages.bills') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pinvoices">{{ __('messages.invoices') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#pAdvancedPayments">{{ __('messages.advanced_payments') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#pDocument">{{ __('messages.documents') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"
                   href="#pVaccinated">{{ __('messages.vaccinations') }}</a>
            </li>
        </ul>

        <div class="tab-content">
            {{--             Patient Cases --}}
            <div class="tab-pane active" id="pcases">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="patientCases"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-5">{{ __('messages.case.case_id') }}</th>
                                    <th class="w-10">{{ __('messages.case.doctor') }}</th>
                                    <th class="w-30">{{ __('messages.case.description') }}</th>
                                    <th class="w-10">{{ __('messages.case.phone') }}</th>
                                    <th class="w-10">{{ __('messages.case.case_date') }}</th>
                                    <th class="w-5 text-right">{{ __('messages.case.fee') }}</th>
                                    <th class="w-5 text-center">{{ __('messages.common.status') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->cases as $case)
                                    <tr>
                                        <td>{{ $case->case_id }}</td>
                                        <td>@if(Auth::user()->hasRole('Patient|Nurse|Case Manager'))
                                                {{ $case->doctor->user->full_name }}
                                            @else
                                                <a href="{{ url('doctors',$case->doctor->id) }}">{{ $case->doctor->user->full_name }}</a>
                                            @endif

                                        </td>
                                        <td class="text-truncate"
                                            style="max-width: 150px">{!! (!empty($case->description)) ?nl2br(e($case->description)) : __('messages.common.n/a')  !!} </td>
                                        <td>{{ (!empty($case->phone)) ? $case->phone : __('messages.common.n/a') }}</td>
                                        <td class="word-nowrap">{{ \Carbon\Carbon::parse($case->date)->format('jS M, Y g:i A') }}</td>
                                        <td class="text-right word-nowrap">
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

            {{--             Patient Admissions --}}
            <div class="tab-pane fade" id="padmissions">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="patientAdmissions"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10 text-center">{{ __('messages.bill.admission_id') }}</th>
                                    <th class="w-10">{{ __('messages.patient_admission.doctor') }}</th>
                                    <th class="w-10">{{ __('messages.patient_admission.admission_date') }}</th>
                                    <th class="w-10">{{ __('messages.patient_admission.discharge_date') }}</th>
                                    <th class="w-10 text-center">{{ __('messages.common.status') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->admissions as $admission)
                                    <tr>
                                        <td class="text-center">
                                            @if(Auth::user()->hasRole('Admin|Doctor|Case Manager'))
                                                <a href="{{ url('patient-admissions',$admission->id) }}">{{ $admission->patient_admission_id }}</a>
                                            @else
                                                {{ $admission->patient_admission_id }}
                                            @endif
                                        </td>
                                        <td>@if(Auth::user()->hasRole('Patient|Nurse|Case Manager'))
                                                {{ $admission->doctor->user->full_name }}
                                            @else
                                                <a href="{{ url('doctors',$admission->doctor->id) }}">{{ $admission->doctor->user->full_name }}</a>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($admission->admission_date)->format('jS M, Y g:i A') }}</td>
                                        <td>{{ !empty($admission->discharge_date)?date('jS M, Y g:i A', strtotime($admission->discharge_date)):'N/A' }}</td>
                                        <td class="text-center">{{ ($admission->status) ? __('messages.common.active') : __('messages.common.de_active') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{--             Patient Appointments --}}
            <div class="tab-pane fade" id="pappointments">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="patientAppointments"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10">{{ __('messages.appointment.doctor') }}</th>
                                    <th class="w-10">{{ __('messages.appointment.doctor_department') }}</th>
                                    <th class="w-10">{{ __('messages.appointment.date') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->appointments as $appointment)
                                    <tr>
                                        <td>
                                            @if(Auth::user()->hasRole('Admin|Doctor|Lab Technician|Pharmacist|Accountant'))
                                                <a href="{{ url('employee/doctor',$appointment->doctor->id) }}">{{ $appointment->doctor->user->full_name }}</a>
                                            @else
                                                {{ $appointment->doctor->user->full_name }}
                                            @endif

                                        </td>
                                        <td>{{ $appointment->doctor->department->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->opd_date)->format('jS M, Y g:i A') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{--                         Patient Bills --}}
            <div class="tab-pane fade" id="pbills">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="patientBills"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10 text-center">{{ __('messages.bill.admission_id') }}</th>
                                    <th class="w-10">{{ __('messages.bill.bill_date') }}</th>
                                    <th class="w-10 text-right">{{ __('messages.bill.amount') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->bills as $bill)
                                    <tr>
                                        <td class="text-center">
                                            @if(Auth::user()->hasRole('Admin|Patient'))
                                                <a href="{{ url('employee/bills',$bill->id) }}">{{ $bill->patient_admission_id }}</a>
                                            @elseif(Auth::user()->hasRole('Accountant'))
                                                <a href="{{ url('bills',$bill->id) }}">{{ $bill->patient_admission_id }}</a>
                                            @else
                                                {{ $bill->patient_admission_id }}
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($bill->bill_date)->format('jS M, Y g:i A') }}</td>
                                        <td class="text-right">
                                            <b>{{ getCurrencySymbol() }}</b>{{ number_format($bill->amount, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{--             Patient Invoices --}}
            <div class="tab-pane fade" id="pinvoices">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="patientInvoices"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10">{{ __('messages.invoice.invoice_date') }}</th>
                                    <th class="w-10 text-center">{{ __('messages.common.status') }}</th>
                                    <th class="w-10 text-right">{{ __('messages.invoice.amount') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->invoices as $invoice)
                                    <tr>
                                        <td>
                                            @if(Auth::user()->hasRole('Admin|Patient'))
                                                <a href="{{ url('employee/invoices',$invoice->id) }}">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('jS M, Y') }}</a>
                                            @elseif(Auth::user()->hasRole('Accountant'))
                                                <a href="{{ url('invoices',$invoice->id) }}">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('jS M, Y') }}</a>
                                            @else
                                                {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('jS M, Y') }}
                                            @endif
                                        </td>
                                        <td class="text-center">{{ ($invoice->status) ? __('messages.invoice.paid') : __('messages.invoice.not_paid') }}</td>
                                        <td class="text-right">
                                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($invoice->amount - ($invoice->amount * $invoice->discount / 100), 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{--             Patient Advanced Payments --}}
            <div class="tab-pane fade" id="pAdvancedPayments">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="patientAdvancedPayments"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10 text-center">{{ __('messages.advanced_payment.receipt_no') }}</th>
                                    <th class="w-10">{{ __('messages.advanced_payment.date') }}</th>
                                    <th class="w-10 text-right">{{ __('messages.advanced_payment.amount') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->advancedpayments as $advancedPayment)
                                    <tr>
                                        <td class="text-center">{{ $advancedPayment->receipt_no }}</td>
                                        <td>{{ \Carbon\Carbon::parse($advancedPayment->date)->format('jS M, Y') }}</td>
                                        <td class="text-right">
                                            <b>{{ getCurrencySymbol() }}</b>{{ number_format($advancedPayment->amount, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{--             Patient Document --}}
            <div class="tab-pane fade" id="pDocument">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="patientDocuments"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10 text-center">{{ __('messages.document.attachment') }}</th>
                                    <th class="w-10">{{ __('messages.document.title') }}</th>
                                    <th class="w-10">{{ __('messages.document.document_type') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->documents as $document)
                                    <tr>
                                        <td class="w-5 text-center">
                                            @if (!empty($document->document_url))
                                                <a href="{{url('document-download',$document->id)}}">Download</a>
                                            @else
                                                {{'N/A'}}
                                            @endif
                                        </td>
                                        <td class="w-10">{{$document->title}}</td>
                                        <td class="w-10">{{$document->documentType->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{--             Patient Vaccinated --}}
            <div class="tab-pane fade" id="pVaccinated">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive viewList">
                            <table id="patientVaccinated"
                                   class="display table table-responsive-sm table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-10">{{ __('messages.vaccinated_patient.vaccination') }}</th>
                                    <th class="w-10">{{ __('messages.vaccinated_patient.serial_no') }}</th>
                                    <th class="w-10">{{ __('messages.vaccinated_patient.does_no') }}</th>
                                    <th class="w-10">{{ __('messages.vaccinated_patient.dose_given_date') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->vaccinations as $vaccination)
                                    <tr>
                                        <td class="w-5">{{ $vaccination->vaccination->name }}</td>
                                        <td class="w-10">{{!empty($vaccination->vaccination_serial_number) ? $vaccination->vaccination_serial_number : __('messages.common.n/a') }}</td>
                                        <td class="w-10">{{$vaccination->dose_number}}</td>
                                        <td>{{ \Carbon\Carbon::parse($vaccination->dose_given_date)->format('jS M, Y g:i A') }}</td>
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
