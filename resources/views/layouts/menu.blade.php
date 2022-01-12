@php($modules = App\Models\Module::cacheFor(now()->addDays())->toBase()->get())
@role('Admin')
{{--Dashboard--}}
<li class="nav-item side-menus {{ Request::is('dashboard*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('dashboard') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.dashboard.dashboard') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-chart-pie"></i>
        <span>{{ __('messages.dashboard.dashboard') }}</span>
    </a>
</li>

{{--Users--}}
<li class="nav-item side-menus {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('users.index') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.users') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-user-friends"></i>
        <span>{{ __('messages.users') }}</span>
    </a>
</li>

{{--ipds--}}
@module('IPD Patients',$modules)
<li class="nav-item side-menus {{ Request::is('ipds*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('ipd.patient.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.ipd_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-notes-medical"></i>
        <span>{{ __('messages.ipd_patients') }}</span>
    </a>
</li>
@endmodule

{{--opds--}}
@module('OPD Patients',$modules)
<li class="nav-item side-menus {{ Request::is('opds*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('opd.patient.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.opd_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-stethoscope"></i>
        <span>{{ __('messages.opd_patients') }}</span>
    </a>
</li>
@endmodule


{{-- Vaccination --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.vaccinations') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-syringe"></i>
        {{ __('messages.vaccinations') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Vaccinated Patients',$modules)
        <li class="nav-item side-menus {{ Request::is('vaccinated-patients*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('vaccinated-patients.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.vaccinated_patients') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-head-side-mask"></i>
                <span>{{ __('messages.vaccinated_patients') }}</span>
            </a>
        </li>
        @endmodule
        @module('Vaccinations',$modules)
        <li class="nav-item side-menus {{ Request::is('vaccinations*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('vaccinations.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.vaccinations') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-syringe"></i>
                <span>{{ __('messages.vaccinations') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>


{{-- Billing --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.billing') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        {{ __('messages.billing') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Accounts',$modules)
        <li class="nav-item side-menus {{ Request::is('accounts*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('accounts.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.accounts') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-piggy-bank"></i>
                <span>{{ __('messages.accounts') }}</span>
            </a>
        </li>
        @endmodule
        @module('Employee Payrolls',$modules)
        <li class="nav-item side-menus {{ Request::is('employee-payrolls*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('employee-payrolls.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.employee_payrolls') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-chart-pie"></i>
                <span>{{ __('messages.employee_payrolls') }}</span>
            </a>
        </li>
        @endmodule
        @module('Invoices',$modules)
        <li class="nav-item side-menus {{ Request::is('invoices*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('invoices.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.invoices') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-invoice"></i>
                <span>{{ __('messages.invoices') }}</span>
            </a>
        </li>
        @endmodule
        @module('Payments',$modules)
        <li class="nav-item side-menus {{ Request::is('payments*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('payments.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.payments') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon far fa-credit-card"></i>
                <span>{{ __('messages.payments') }}</span>
            </a>
        </li>
        @endmodule
        @module('Payment Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('payment-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('payment.reports') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.payment.payment_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-funnel-dollar"></i>
                <span>{{ __('messages.payment.payment_reports') }}</span>
            </a>
        </li>
        @endmodule
        @module('Advance Payments',$modules)
        <li class="nav-item side-menus {{ Request::is('advanced-payments*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('advanced-payments.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.advanced_payments') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <span>{{ __('messages.advanced_payments') }}</span>
            </a>
        </li>
        @endmodule
        @module('Bills',$modules)
        <li class="nav-item side-menus {{ Request::is('bills*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('bills.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.bills') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-rupee-sign"></i>
                <span>{{ __('messages.bills') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Bed Management  --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.bed_manager') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-bed"></i>
        {{ __('messages.bed_manager') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Bed Types',$modules)
        <li class="nav-item side-menus {{ Request::is('bed-types*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('bed-types.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.bed_types') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="fas nav-icon fa-laptop-medical"></i>
                <span>{{ __('messages.bed_types') }}</span>
            </a>
        </li>
        @endmodule
        @module('Beds',$modules)
        <li class="nav-item side-menus {{ (Request::is('beds*') || Request::is('bulk-beds')) ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('beds.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.beds') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-procedures"></i>
                <span>{{ __('messages.beds') }}</span>
            </a>
        </li>
        @endmodule
        @module('Bed Assigns',$modules)
        <li class="nav-item side-menus {{ Request::is('bed-assigns*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('bed-assigns.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.bed_assigns') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="fas nav-icon fa-user-plus"></i>
                <span>{{ __('messages.bed_assigns') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Blood Bank dropdown --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.blood_bank') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-tint"></i>
        {{ __('messages.blood_bank') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Blood Banks',$modules)
        <li class="nav-item side-menus {{ Request::is('blood-banks*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('blood-banks.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.blood_banks') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-hospital"></i>
                <span>{{ __('messages.blood_banks') }}</span>
            </a>
        </li>
        @endmodule
        @module('Blood Donors',$modules)
        <li class="nav-item side-menus {{ Request::is('blood-donors*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('blood-donors.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.blood_donors') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-award"></i>
                <span>{{ __('messages.blood_donors') }}</span>
            </a>
        </li>
        @endmodule
        @module('Blood Donations',$modules)
        <li class="nav-item side-menus {{ Request::is('blood-donations*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('blood-donations.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.blood_donations') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-hand-holding-heart"></i>
                <span>{{ __('messages.blood_donations') }}</span>
            </a>
        </li>
        @endmodule
        @module('Blood Issues',$modules)
        <li class="nav-item side-menus {{ Request::is('blood-issues*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('blood-issues.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.blood_issues') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-bong"></i>
                <span>{{ __('messages.blood_issues') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{--Cases Mgt--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.patients') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-user-injured"></i>
        {{ __('messages.patients') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Patients',$modules)
        <li class="nav-item side-menus {{ Request::is('patients*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patients.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.patients') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-user-injured"></i>
                <span>{{ __('messages.patients') }}</span>
            </a>
        </li>
        @endmodule
        @module('Cases',$modules)
        <li class="nav-item side-menus {{ Request::is('patient-cases*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patient-cases.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.cases') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-briefcase-medical"></i>
                <span>{{ __('messages.cases') }}</span>
            </a>
        </li>
        @endmodule
        @module('Case Handlers',$modules)
        <li class="nav-item side-menus {{ Request::is('case-handlers*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('case-handlers.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.case_handlers') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-briefcase"></i>
                <span>{{ __('messages.case_handlers') }}</span>
            </a>
        </li>
        @endmodule
        @module('Patient Admissions',$modules)
        <li class="nav-item side-menus {{ Request::is('patient-admissions*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patient-admissions.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.patient_admissions') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-history"></i>
                <span>{{ __('messages.patient_admissions') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{--Documents Mgt--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.documents') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-file"></i>
        {{ __('messages.documents') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Documents',$modules)
        <li class="nav-item side-menus {{ Request::is('documents*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('documents.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.documents') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file"></i>
                <span>{{ __('messages.documents') }}</span>
            </a>
        </li>
        @endmodule
        @module('Document Types',$modules)
        <li class="nav-item side-menus {{ Request::is('document-types*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('document-types.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.document_types') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-folder"></i>
                <span>{{ __('messages.document_types') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Services dropdown --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.services') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-box"></i>
        {{ __('messages.services') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Insurances',$modules)
        <li class="nav-item side-menus {{ Request::is('insurances*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('insurances.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.insurances') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-shield-alt"></i>
                <span>{{ __('messages.insurances') }}</span>
            </a>
        </li>
        @endmodule
        @module('Packages',$modules)
        <li class="nav-item side-menus {{ Request::is('packages*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('packages.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.packages') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-briefcase"></i>
                <span>{{ __('messages.packages') }}</span>
            </a>
        </li>
        @endmodule
        @module('Services',$modules)
        <li class="nav-item side-menus {{ Request::is('services*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('services.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.services') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-box"></i>
                <span>{{ __('messages.services') }}</span>
            </a>
        </li>
        @endmodule
        @module('Ambulances',$modules)
        <li class="nav-item side-menus {{ Request::is('ambulances*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('ambulances*') ? 'active' : '' }} menu-text-wrap"
               href="{{ route('ambulances.index') }}" data-toggle="tooltip" data-placement="bottom"
               title="{{ __('messages.ambulances') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-ambulance"></i>
                <span>{{ __('messages.ambulances') }}</span>
            </a>
        </li>
        @endmodule
        @module('Ambulances Calls',$modules)
        <li class="nav-item side-menus {{ Request::is('ambulance-calls*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('ambulance-calls*') ? 'active' : '' }} menu-text-wrap"
               href="{{ route('ambulance-calls.index') }}" data-toggle="tooltip" data-placement="bottom"
               title="{{ __('messages.ambulance_calls') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-phone-volume"></i>
                <span>{{ __('messages.ambulance_calls') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Doctors dropdown --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.doctors') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fa fa-user-md"></i>
        {{ __('messages.doctors') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Doctors',$modules)
        <li class="nav-item side-menus {{ Request::is('doctors*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('doctors.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.doctors') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-user-md"></i>
                <span>{{ __('messages.doctors') }}</span>
            </a>
        </li>
        @endmodule
        @module('Doctor Departments',$modules)
        <li class="nav-item side-menus {{ Request::is('doctor-departments*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('doctor-departments.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.doctor_departments') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-table"></i>
                <span>{{ __('messages.doctor_departments') }}</span>
            </a>
        </li>
        @endmodule
        @module('Schedules',$modules)
        <li class="nav-item side-menus {{ Request::is('schedules*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('schedules.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.schedules') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-calendar-alt"></i>
                <span>{{ __('messages.schedules') }}</span>
            </a>
        </li>
        @endmodule
        @module('Prescriptions',$modules)
        <li class="nav-item side-menus {{ Request::is('prescriptions*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('prescriptions.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.prescriptions') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-prescription"></i>
                <span>{{ __('messages.prescriptions') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{--Accountantants--}}
@module('Accountants',$modules)
<li class="nav-item side-menus {{ Request::is('accountants*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('accountants.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.accountants') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-file-invoice"></i>
        <span>{{ __('messages.accountants') }}</span>
    </a>
</li>
@endmodule

{{--Nursers--}}
@module('Nurses',$modules)
<li class="nav-item side-menus {{ Request::is('nurses*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('nurses.index') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.nurses') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-user-nurse"></i>
        <span>{{ __('messages.nurses') }}</span>
    </a>
</li>
@endmodule

{{--Receptinist--}}
@module('Receptionists',$modules)
<li class="nav-item side-menus {{ Request::is('receptionists*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('receptionists.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.receptionists') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-user-tie"></i>
        <span>{{ __('messages.receptionists') }}</span>
    </a>
</li>
@endmodule

{{--Pharmacsist--}}
@module('Pharmacists',$modules)
<li class="nav-item side-menus {{ Request::is('lab-technicians*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('lab-technicians.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.lab_technicians') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-microscope"></i>
        <span>{{ __('messages.lab_technicians') }}</span>
    </a>
</li>
@endmodule

{{--Lab Technician--}}
@module('Lab Technicians',$modules)
<li class="nav-item side-menus {{ Request::is('pharmacists*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('pharmacists.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.pharmacists') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-file-prescription"></i>
        <span>{{ __('messages.pharmacists') }}</span>
    </a>
</li>
@endmodule

{{--Appointments--}}
@module('Appointments',$modules)
<li class="nav-item side-menus {{ Request::is('appointment*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('appointment*') ? 'active' : '' }} menu-text-wrap"
       href="{{ route('appointments.index') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.appointments') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-calendar-check"></i>
        <span>{{ __('messages.appointments') }}</span>
    </a>
</li>
@endmodule

{{-- Hospital Activities dropdown --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.reports') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-file-medical"></i>
        {{ __('messages.reports') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Birth Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('birth-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('birth-reports.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.birth_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-file-alt"></i>
                <span>{{ __('messages.birth_reports') }}</span>
            </a>
        </li>
        @endmodule

        @module('Death Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('death-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('death-reports.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.death_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-book-dead"></i>
                <span>{{ __('messages.death_reports') }}</span>
            </a>
        </li>
        @endmodule

        @module('Investigation Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('investigation-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('investigation-reports.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.investigation_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-search"></i>
                <span>{{ __('messages.investigation_reports') }}</span>
            </a>
        </li>
        @endmodule

        @module('Operation Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('operation-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('operation-reports.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.operation_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-medical-alt"></i>
                <span>{{ __('messages.operation_reports') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Medicines dropdown --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.medicines') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-capsules"></i>
        {{ __('messages.medicines') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Medicine Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('categories.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicine_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-pills"></i>
                <span>{{ __('messages.medicine_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Medicine Brands',$modules)
        <li class="nav-item side-menus {{ Request::is('brands*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('brands.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicine_brands') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-bold"></i>
                <span>{{ __('messages.medicine_brands') }}</span>
            </a>
        </li>
        @endmodule
        @module('Medicines',$modules)
        <li class="nav-item side-menus {{ Request::is('medicines*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('medicines.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicines') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-capsules"></i>
                <span>{{ __('messages.medicines') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Radiology --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.radiologies') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-x-ray"></i>
        {{ __('messages.radiologies') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Radiology Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('radiology-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('radiology.category.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.radiology_category.radiology_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-x-ray"></i>
                <span>{{ __('messages.radiology_category.radiology_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Radiology Tests',$modules)
        <li class="nav-item side-menus {{ Request::is('radiology-tests*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('radiology.test.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.radiology_tests') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-vial"></i>
                <span>{{ __('messages.radiology_tests') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Pathology --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.pathologies') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-flask"></i>
        {{ __('messages.pathologies') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Pathology Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('pathology-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('pathology.category.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.pathology_category.pathology_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon  fa fa-flask"></i>
                <span>{{ __('messages.pathology_category.pathology_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Pathology Tests',$modules)
        <li class="nav-item side-menus {{ Request::is('pathology-tests*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('pathology.test.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.pathology_tests') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-vials"></i>
                <span>{{ __('messages.pathology_tests') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{--Diagnosis Test--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.patient_diagnosis_test.diagnosis') }}" data-delay='{"show":"500", "hide":"50"}'
       data-trigger="hover">
        <i class="nav-icon fas fa-diagnoses"></i>
        {{ __('messages.patient_diagnosis_test.diagnosis') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Diagnosis Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('diagnosis-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('diagnosis.category.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.diagnosis_category.diagnosis_categories')}}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-diagnoses"></i>
                <span>{{__('messages.diagnosis_category.diagnosis_categories')}}</span>
            </a>
        </li>
        @endmodule
        @module('Diagnosis Tests',$modules)
        <li class="nav-item side-menus {{ Request::is('patient-diagnosis-test*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patient.diagnosis.test.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.patient_diagnosis_test.diagnosis_test') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-medical"></i>
                <span>{{ __('messages.patient_diagnosis_test.diagnosis_test') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Finance --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{__('messages.finance')}}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-money-bill"></i>
        {{__('messages.finance')}}
    </a>
    <ul class="nav-dropdown-items">
        @module('Income',$modules)
        <li class="nav-item side-menus {{ Request::is('incomes*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('incomes.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.incomes.incomes')}}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-wallet"></i>
                <span>{{__('messages.incomes.incomes')}}</span>
            </a>
        </li>
        @endmodule

        @module('Expense',$modules)
        <li class="nav-item side-menus {{ Request::is('expenses*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('expenses.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.expenses')}}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-money-check"></i>
                <span>{{__('messages.expenses')}}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Inventory Management  --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.inventory') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-luggage-cart"></i>
        {{ __('messages.inventory') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Items Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('item-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('item-categories.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.items_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="fas nav-icon fa-list-alt"></i>
                <span>{{ __('messages.items_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Items',$modules)
        <li class="nav-item side-menus {{ Request::is('items*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('items.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.items') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="fas nav-icon fa-store"></i>
                <span>{{ __('messages.items') }}</span>
            </a>
        </li>
        @endmodule
        @module('Item Stocks',$modules)
        <li class="nav-item side-menus {{ Request::is('item-stocks*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('item.stock.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.items_stocks') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="fab nav-icon fa-speakap"></i>
                <span>{{ __('messages.items_stocks') }}</span>
            </a>
        </li>
        @endmodule
        @module('Issued Items',$modules)
        <li class="nav-item side-menus {{ Request::is('issued-items*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('issued.item.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.issued_items') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="fas nav-icon fa-italic"></i>
                <span>{{ __('messages.issued_items') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Hospital Charges --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.hospital_charges') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-coins"></i>
        {{ __('messages.hospital_charges') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Charge Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('charge-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('charge-categories.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.charge_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-coins"></i>
                <span>{{ __('messages.charge_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Charges',$modules)
        <li class="nav-item side-menus {{ Request::is('charges*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('charges.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.charges') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <span>{{ __('messages.charges') }}</span>
            </a>
        </li>
        @endmodule
        {{--Doctor OPD Charge--}}
        @module('Doctor OPD Charges',$modules)
        <li class="nav-item side-menus {{ Request::is('doctor-opd-charges*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('doctor-opd-charges.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.doctor_opd_charges')}}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-invoice"></i>
                <span>{{__('messages.doctor_opd_charges')}}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Front office --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.front_office') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-dungeon"></i>
        {{ __('messages.front_office') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Call Logs',$modules)
        <li class="nav-item side-menus {{ Request::is('call-logs*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('call_logs.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.call_logs') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-phone"></i>
                <span>{{ __('messages.call_logs') }}</span>
            </a>
        </li>
        @endmodule
        @module('Visitors',$modules)
        <li class="nav-item side-menus {{ Request::is('visitor*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('visitors.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.visitors') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-users"></i>
                <span>{{ __('messages.visitors') }}</span>
            </a>
        </li>
        @endmodule
        @module('Postal Receive',$modules)
        <li class="nav-item side-menus {{ Request::is('receives*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('receives.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.postal_receive') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-shipping-fast"></i>
                <span>{{ __('messages.postal_receive') }}</span>
            </a>
        </li>
        @endmodule
        @module('Postal Dispatch',$modules)
        <li class="nav-item side-menus {{ Request::is('dispatches*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('dispatches.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.postal_dispatch') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-truck"></i>
                <span>{{ __('messages.postal_dispatch') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Live Consultation --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.live_consultations') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-video"></i>
        {{ __('messages.live_consultations') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Live Consultations',$modules)
        <li class="nav-item side-menus {{ Request::is('live-consultation*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('live.consultation.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.live_consultations') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-video"></i>
                <span>{{ __('messages.live_consultations') }}</span>
            </a>
        </li>
        @endmodule
        @module('Live Meetings',$modules)
        <li class="nav-item side-menus {{ Request::is('live-meeting*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('live.meeting.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.live_meetings') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-file-video"></i>
                <span>{{ __('messages.live_meetings') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Settings --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.settings') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-cogs"></i>
        {{ __('messages.settings') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Notice Boards',$modules)
        <li class="nav-item side-menus {{ Request::is('notice-boards*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ url('notice-boards') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.notice_boards') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-clipboard"></i>
                <span>{{ __('messages.notice_boards') }}</span>
            </a>
        </li>
        @endmodule
        @module('Testimonial',$modules)
        <li class="nav-item side-menus {{ Request::is('testimonials*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('testimonials.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.testimonials') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fab fa-alipay"></i>
                <span>{{ __('messages.testimonials') }}</span>
            </a>
        </li>
        @endmodule
        <li class="nav-item side-menus {{ Request::is('settings*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('settings.edit') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.settings') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-cogs"></i>
                <span>{{ __('messages.settings') }}</span>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item side-menus {{ Request::is('front-settings*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('front.settings.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.front_settings') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-cog"></i>
        <span>{{ __('messages.front_settings') }}</span>
    </a>
</li>


@module('SMS',$modules)
<li class="nav-item side-menus {{ Request::is('sms*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('sms.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.sms.sms') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-sms"></i>
        <span>{{ __('messages.sms.sms') }}</span>
    </a>
</li>
@endmodule

{{-- Mail --}}
@module('Mail',$modules)
<li class="nav-item side-menus {{ Request::is('mail*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('mail') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.mail') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-envelope"></i>
        <span>{{ __('messages.mail') }}</span>
    </a>
</li>
@endmodule

{{-- Enquiries --}}
@module('Enquires',$modules)
<li class="nav-item side-menus {{ Request::is('enquiries*') || Request::is('enquiry*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('enquiries') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.enquiries') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-question-circle"></i>
        <span>{{ __('messages.enquiries') }}</span>
    </a>
</li>
@endmodule
@endrole

@role('Doctor')
@module('Doctors',$modules)
<li class="nav-item side-menus {{ Request::is('employee/doctor*') ? 'active' : '' }} }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/doctor') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.doctors') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-user-md"></i>
        <span>{{ __('messages.doctors') }}</span>
    </a>
</li>
@endmodule
@module('Bed Assigns',$modules)
<li class="nav-item side-menus {{ Request::is('bed-assigns*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('bed-assigns.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.bed_assigns') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="fas nav-icon fa-user-plus"></i>
        <span>{{ __('messages.bed_assigns') }}</span>
    </a>
</li>
@endmodule
@module('Patient Admissions',$modules)
<li class="nav-item side-menus {{ Request::is('patient-admissions*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('patient-admissions.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.patient_admissions') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-history"></i>
        <span>{{ __('messages.patient_admissions') }}</span>
    </a>
</li>
@endmodule
@module('Prescriptions',$modules)
<li class="nav-item side-menus {{ Request::is('prescriptions*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('prescriptions.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.prescriptions') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-prescription"></i>
        <span>{{ __('messages.prescriptions') }}</span>
    </a>
</li>
@endmodule
@module('Documents',$modules)
<li class="nav-item side-menus {{ Request::is('documents*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('documents.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.documents') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-file"></i>
        <span>{{ __('messages.documents') }}</span>
    </a>
</li>
@endmodule
@module('Schedules',$modules)
<li class="nav-item side-menus {{ Request::is('schedules*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('schedules.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.schedules') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-calendar-alt"></i>
        <span>{{ __('messages.schedules') }}</span>
    </a>
</li>
@endmodule
@module('Appointments',$modules)
<li class="nav-item side-menus {{ Request::is('appointments*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('appointments.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.appointments') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-calendar-check"></i>
        <span>{{ __('messages.appointments') }}</span>
    </a>
</li>
@endmodule
@module('IPD Patients',$modules)
<li class="nav-item side-menus {{ Request::is('ipds*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('ipd.patient.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.ipd_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-procedures"></i>
        <span>{{ __('messages.ipd_patients') }}</span>
    </a>
</li>
@endmodule
@module('OPD Patients',$modules)
<li class="nav-item side-menus {{ Request::is('opds*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('opd.patient.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.opd_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-stethoscope"></i>
        <span>{{ __('messages.opd_patients') }}</span>
    </a>
</li>
@endmodule

{{--Diagnosis Test--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.patient_diagnosis_test.diagnosis') }}" data-delay='{"show":"500", "hide":"50"}'
       data-trigger="hover">
        <i class="nav-icon fas fa-diagnoses"></i>
        {{ __('messages.patient_diagnosis_test.diagnosis') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Diagnosis Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('diagnosis-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('diagnosis.category.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.diagnosis_category.diagnosis_categories')}}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-diagnoses"></i>
                <span>{{__('messages.diagnosis_category.diagnosis_categories')}}</span>
            </a>
        </li>
        @endmodule
        @module('Diagnosis Tests',$modules)
        <li class="nav-item side-menus {{ Request::is('patient-diagnosis-test*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patient.diagnosis.test.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.patient_diagnosis_test.diagnosis_test') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-medical"></i>
                <span>{{ __('messages.patient_diagnosis_test.diagnosis_test') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Reports --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.reports') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-hospital"></i>
        {{ __('messages.reports') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Birth Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('birth-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('birth-reports.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.birth_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-file-alt"></i>
                <span>{{ __('messages.birth_reports') }}</span>
            </a>
        </li>
        @endmodule
        @module('Death Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('death-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('death-reports.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.death_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-book-dead"></i>
                <span>{{ __('messages.death_reports') }}</span>
            </a>
        </li>
        @endmodule
        @module('Investigation Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('investigation-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('investigation-reports.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.investigation_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-search"></i>
                <span>{{ __('messages.investigation_reports') }}</span>
            </a>
        </li>
        @endmodule
        @module('Operation Reports',$modules)
        <li class="nav-item side-menus {{ Request::is('operation-reports*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('operation-reports.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.operation_reports') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-medical-alt"></i>
                <span>{{ __('messages.operation_reports') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>
{{-- Live Consultation --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.live_consultations') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-video"></i>
        {{ __('messages.live_consultations') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Live Consultations',$modules)
        <li class="nav-item side-menus {{ Request::is('live-consultation*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('live.consultation.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.live_consultations') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-video"></i>
                <span>{{ __('messages.live_consultations') }}</span>
            </a>
        </li>
        @endmodule
        @module('Live Meetings',$modules)
        <li class="nav-item side-menus {{ Request::is('live-meeting*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('live.meeting.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.live_meetings') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-file-video"></i>
                <span>{{ __('messages.live_meetings') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>
@module('Notice Boards',$modules)
<li class="nav-item side-menus {{ Request::is('employee/notice-board*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/notice-board') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.notice_boards') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-clipboard"></i>
        <span>{{ __('messages.notice_boards') }}</span>
    </a>
</li>
@endmodule
{{-- SMS --}}
@module('SMS',$modules)
<li class="nav-item side-menus {{ Request::is('sms*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('sms.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.sms.sms') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-sms"></i>
        <span>{{ __('messages.sms.sms') }}</span>
    </a>
</li>
@endmodule
@module('My Payrolls',$modules)
<li class="nav-item side-menus {{ Request::is('employee/payroll') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('payroll') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.my_payrolls') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-chart-pie"></i>
        <span>{{ __('messages.my_payrolls') }}</span>
    </a>
</li>
@endmodule
@endrole

@role('Case Manager')
@module('Doctors',$modules)
<li class="nav-item side-menus {{ Request::is('employee/doctor*') ? 'active' : '' }} }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/doctor') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.doctors') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-user-md"></i>
        <span>{{ __('messages.doctors') }}</span>
    </a>
</li>
@endmodule
@module('Patient Admissions',$modules)
<li class="nav-item side-menus {{ Request::is('patient-admissions*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('patient-admissions.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.patient_admissions') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-history"></i>
        <span>{{ __('messages.patient_admissions') }}</span>
    </a>
</li>
@endmodule
@module('Cases',$modules)
<li class="nav-item side-menus {{ Request::is('patient-cases*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('patient-cases.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.cases') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-briefcase-medical"></i>
        <span>{{ __('messages.cases') }}</span>
    </a>
</li>
@endmodule
@module('Ambulances',$modules)
<li class="nav-item side-menus {{ Request::is('ambulances*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('ambulances*') ? 'active' : '' }} menu-text-wrap"
       href="{{ route('ambulances.index') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.ambulances') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-ambulance"></i>
        <span>{{ __('messages.ambulances') }}</span>
    </a>
</li>
@endmodule
@module('Ambulances Calls',$modules)
<li class="nav-item side-menus {{ Request::is('ambulance-calls*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('ambulance-calls*') ? 'active' : '' }} menu-text-wrap"
       href="{{ route('ambulance-calls.index') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.ambulance_calls') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-phone-volume"></i>
        <span>{{ __('messages.ambulance_calls') }}</span>
    </a>
</li>
@endmodule

{{-- SMS --}}
@module('SMS',$modules)
<li class="nav-item side-menus {{ Request::is('sms*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('sms.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.sms.sms') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-sms"></i>
        <span>{{ __('messages.sms.sms') }}</span>
    </a>
</li>
@endmodule
{{-- Live Meeting --}}
@module('Live Meetings',$modules)
<li class="nav-item side-menus {{ Request::is('live-meeting*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('live.meeting.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.live_meetings') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-file-video"></i>
        <span>{{ __('messages.live_meetings') }}</span>
    </a>
</li>
@endmodule

{{-- Mail --}}
@module('Mail',$modules)
<li class="nav-item side-menus {{ Request::is('mail*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('mail') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.mail') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-envelope"></i>
        <span>{{ __('messages.mail') }}</span>
    </a>
</li>
@endmodule
@module('Notice Boards',$modules)
<li class="nav-item side-menus {{ Request::is('employee/notice-board*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/notice-board') }}" data-toggle="tooltip"
       data-placement="bottom"
       title="{{ __('messages.notice_boards') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-clipboard"></i>
        <span>{{ __('messages.notice_boards') }}</span>
    </a>
</li>
@endmodule
@module('My Payrolls',$modules)
<li class="nav-item side-menus {{ Request::is('employee/payroll') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('payroll') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.my_payrolls') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-chart-pie"></i>
        <span>{{ __('messages.my_payrolls') }}</span>
    </a>
</li>
@endmodule
@endrole

@role('Receptionist')
@module('Appointments',$modules)
<li class="nav-item side-menus {{ Request::is('appointments*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('appointments.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.appointments') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-calendar-check"></i>
        <span>{{ __('messages.appointments') }}</span>
    </a>
</li>
@endmodule
{{--Cases Mgt--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.patients') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-user-injured"></i>
        {{ __('messages.patients') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Patients',$modules)
        <li class="nav-item side-menus {{ Request::is('patients*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patients.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.patients') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-user-injured"></i>
                <span>{{ __('messages.patients') }}</span>
            </a>
        </li>
        @endmodule
        @module('Cases',$modules)
        <li class="nav-item side-menus {{ Request::is('patient-cases*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patient-cases.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.cases') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-briefcase-medical"></i>
                <span>{{ __('messages.cases') }}</span>
            </a>
        </li>
        @endmodule
        @module('Case Handlers',$modules)
        <li class="nav-item side-menus {{ Request::is('case-handlers*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('case-handlers.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.case_handlers') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-briefcase"></i>
                <span>{{ __('messages.case_handlers') }}</span>
            </a>
        </li>
        @endmodule
        @module('Patient Admissions',$modules)
        <li class="nav-item side-menus {{ Request::is('patient-admissions*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patient-admissions.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.patient_admissions') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-history"></i>
                <span>{{ __('messages.patient_admissions') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>
@module('Doctors',$modules)
<li class="nav-item side-menus {{ Request::is('doctors*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('doctors.index') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.doctors') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-user-md"></i>
        <span>{{ __('messages.doctors') }}</span>
    </a>
</li>
@endmodule
@module('IPD Patients',$modules)
<li class="nav-item side-menus {{ Request::is('ipds*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('ipd.patient.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.ipd_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-procedures"></i>
        <span>{{ __('messages.ipd_patients') }}</span>
    </a>
</li>
@endmodule
@module('OPD Patients',$modules)
<li class="nav-item side-menus {{ Request::is('opds*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('opd.patient.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.opd_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-stethoscope"></i>
        <span>{{ __('messages.opd_patients') }}</span>
    </a>
</li>
@endmodule
{{-- Radiology --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.radiologies') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-x-ray"></i>
        {{ __('messages.radiologies') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Radiology Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('radiology-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('radiology.category.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.radiology_category.radiology_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon  fa fa-x-ray"></i>
                <span>{{ __('messages.radiology_category.radiology_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Radiology Tests',$modules)
        <li class="nav-item side-menus {{ Request::is('radiology-tests*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('radiology.test.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.radiology_tests') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-vial"></i>
                <span>{{ __('messages.radiology_tests') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>
{{-- Pathology --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.pathologies') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-flask"></i>
        {{ __('messages.pathologies') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Pathology Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('pathology-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('pathology.category.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.pathology_category.pathology_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon  fa fa-flask"></i>
                <span>{{ __('messages.pathology_category.pathology_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Pathology Tests',$modules)
        <li class="nav-item side-menus {{ Request::is('pathology-tests*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('pathology.test.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.pathology_tests') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-vials"></i>
                <span>{{ __('messages.pathology_tests') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{--Diagnosis Test--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.patient_diagnosis_test.diagnosis') }}" data-delay='{"show":"500", "hide":"50"}'
       data-trigger="hover">
        <i class="nav-icon fas fa-diagnoses"></i>
        {{ __('messages.patient_diagnosis_test.diagnosis') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Diagnosis Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('diagnosis-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('diagnosis.category.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.diagnosis_category.diagnosis_categories')}}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-diagnoses"></i>
                <span>{{__('messages.diagnosis_category.diagnosis_categories')}}</span>
            </a>
        </li>
        @endmodule
        @module('Diagnosis Tests',$modules)
        <li class="nav-item side-menus {{ Request::is('patient-diagnosis-test*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patient.diagnosis.test.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.patient_diagnosis_test.diagnosis_test') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-medical"></i>
                <span>{{ __('messages.patient_diagnosis_test.diagnosis_test') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Services dropdown --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.services') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-box"></i>
        {{ __('messages.services') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Insurances',$modules)
        <li class="nav-item side-menus {{ Request::is('insurances*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('insurances.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.insurances') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-shield-alt"></i>
                <span>{{ __('messages.insurances') }}</span>
            </a>
        </li>
        @endmodule
        @module('Packages',$modules)
        <li class="nav-item side-menus {{ Request::is('packages*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('packages.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.packages') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-briefcase"></i>
                <span>{{ __('messages.packages') }}</span>
            </a>
        </li>
        @endmodule
        @module('Services',$modules)
        <li class="nav-item side-menus {{ Request::is('services*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('services.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.services') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-box"></i>
                <span>{{ __('messages.services') }}</span>
            </a>
        </li>
        @endmodule
        @module('Ambulances',$modules)
        <li class="nav-item side-menus {{ Request::is('ambulances*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('ambulances*') ? 'active' : '' }} menu-text-wrap"
               href="{{ route('ambulances.index') }}" data-toggle="tooltip" data-placement="bottom"
               title="{{ __('messages.ambulances') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-ambulance"></i>
                <span>{{ __('messages.ambulances') }}</span>
            </a>
        </li>
        @endmodule
        @module('Ambulances Calls',$modules)
        <li class="nav-item side-menus {{ Request::is('ambulance-calls*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('ambulance-calls*') ? 'active' : '' }} menu-text-wrap"
               href="{{ route('ambulance-calls.index') }}" data-toggle="tooltip" data-placement="bottom"
               title="{{ __('messages.ambulance_calls') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-phone-volume"></i>
                <span>{{ __('messages.ambulance_calls') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Hospital Charges --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.hospital_charges') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-coins"></i>
        {{ __('messages.hospital_charges') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Charge Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('charge-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('charge-categories.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.charge_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-coins"></i>
                <span>{{ __('messages.charge_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Charges',$modules)
        <li class="nav-item side-menus {{ Request::is('charges*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('charges.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.charges') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <span>{{ __('messages.charges') }}</span>
            </a>
        </li>
        @endmodule
        {{--Doctor OPD Charge--}}
        @module('Doctor OPD Charges',$modules)
        <li class="nav-item side-menus {{ Request::is('doctor-opd-charges*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('doctor-opd-charges.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.doctor_opd_charges')}}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-invoice"></i>
                <span>{{__('messages.doctor_opd_charges')}}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Front office --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.front_office') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon  fa fa-dungeon"></i>
        {{ __('messages.front_office') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Call Logs',$modules)
        <li class="nav-item side-menus {{ Request::is('call-logs*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('call_logs.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.call_logs') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-phone"></i>
                <span>{{ __('messages.call_logs') }}</span>
            </a>
        </li>
        @endmodule
        @module('Visitors',$modules)
        <li class="nav-item side-menus {{ Request::is('visitor*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('visitors.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.visitors') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-users"></i>
                <span>{{ __('messages.visitors') }}</span>
            </a>
        </li>
        @endmodule
        @module('Postal Receive',$modules)
        <li class="nav-item side-menus {{ Request::is('receive*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('receives.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.postal_receive') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-shipping-fast"></i>
                <span>{{ __('messages.postal_receive') }}</span>
            </a>
        </li>
        @endmodule
        @module('Postal Dispatch',$modules)
        <li class="nav-item side-menus {{ Request::is('dispatches*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('dispatches.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.postal_dispatch') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-truck"></i>
                <span>{{ __('messages.postal_dispatch') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{--SMS--}}
@module('SMS',$modules)
<li class="nav-item side-menus {{ Request::is('sms*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('sms.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.sms.sms') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-sms"></i>
        <span>{{ __('messages.sms.sms') }}</span>
    </a>
</li>
@endmodule
{{-- Live Meeting --}}
@module('Live Meetings',$modules)
<li class="nav-item side-menus {{ Request::is('live-meeting*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('live.meeting.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.live_meetings') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-file-video"></i>
        <span>{{ __('messages.live_meetings') }}</span>
    </a>
</li>
@endmodule

{{-- Mail --}}
@module('Mail',$modules)
<li class="nav-item side-menus {{ Request::is('mail*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('mail') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.mail') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-envelope"></i>
        <span>{{ __('messages.mail') }}</span>
    </a>
</li>
@endmodule
@module('Notice Boards',$modules)
<li class="nav-item side-menus {{ request()->path() == 'employee/notice-board' ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/notice-board') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.notice_boards') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-clipboard"></i>
        <span>{{ __('messages.notice_boards') }}</span>
    </a>
</li>
@endmodule
@module('Testimonial',$modules)
<li class="nav-item side-menus {{ Request::is('testimonials*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('testimonials.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.testimonials') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fab fa-alipay"></i>
        <span>{{ __('messages.testimonials') }}</span>
    </a>
</li>
@endmodule
@module('My Payrolls',$modules)
<li class="nav-item side-menus {{ Request::is('employee/payroll') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('payroll') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.my_payrolls') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-chart-pie"></i>
        <span>{{ __('messages.my_payrolls') }}</span>
    </a>
</li>
@endmodule
@module('Enquires',$modules)
<li class="nav-item side-menus {{ Request::is('enquiries*') || Request::is('enquiry*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('enquiries') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.enquiries') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-question-circle"></i>
        <span>{{ __('messages.enquiries') }}</span>
    </a>
</li>
@endmodule
@endrole

@role('Pharmacist')
@module('Doctors',$modules)
<li class="nav-item side-menus {{ Request::is('employee/doctor*') ? 'active' : '' }} }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/doctor') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.doctors') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-user-md"></i>
        <span>{{ __('messages.doctors') }}</span>
    </a>
</li>
@endmodule
{{-- Medicines--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.medicines') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-capsules"></i>
        {{ __('messages.medicines') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Medicine Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('categories.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicine_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-pills"></i>
                <span>{{ __('messages.medicine_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Medicine Brands',$modules)
        <li class="nav-item side-menus {{ Request::is('brands*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('brands.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicine_brands') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-bold"></i>
                <span>{{ __('messages.medicine_brands') }}</span>
            </a>
        </li>
        @endmodule
        @module('Medicines',$modules)
        <li class="nav-item side-menus {{ Request::is('medicines*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('medicines.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicines') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-capsules"></i>
                <span>{{ __('messages.medicines') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>
@module('Radiology Tests',$modules)
<li class="nav-item side-menus {{ Request::is('radiology-tests*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('radiology.test.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.radiology_tests') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-vial"></i>
        <span>{{ __('messages.radiology_tests') }}</span>
    </a>
</li>
@endmodule
@module('Pathology Tests',$modules)
<li class="nav-item side-menus {{ Request::is('pathology-tests*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('pathology.test.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.pathology_tests') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-vials"></i>
        <span>{{ __('messages.pathology_tests') }}</span>
    </a>
</li>
@endmodule
@module('Notice Boards',$modules)
<li class="nav-item side-menus {{ Request::is('employee/notice-board*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/notice-board') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.notice_boards') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-clipboard"></i>
        <span>{{ __('messages.notice_boards') }}</span>
    </a>
</li>
@endmodule
{{-- SMS --}}
@module('SMS',$modules)
<li class="nav-item side-menus {{ Request::is('sms*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('sms.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.sms.sms') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-sms"></i>
        <span>{{ __('messages.sms.sms') }}</span>
    </a>
</li>
@endmodule
{{-- Live Meeting --}}
@module('Live Meetings',$modules)
<li class="nav-item side-menus {{ Request::is('live-meeting*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('live.meeting.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.live_meetings') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-file-video"></i>
        <span>{{ __('messages.live_meetings') }}</span>
    </a>
</li>
@endmodule

@module('My Payrolls',$modules)
<li class="nav-item side-menus {{ Request::is('employee/payroll') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('payroll') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.my_payrolls') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-chart-pie"></i>
        <span>{{ __('messages.my_payrolls') }}</span>
    </a>
</li>
@endmodule
@endrole

@role('Nurse')
{{-- Bed Manager --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.bed_manager') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-bed"></i>
        {{ __('messages.bed_manager') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Bed Types',$modules)
        <li class="nav-item side-menus {{ Request::is('bed-types*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('bed-types.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.bed_types') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-bed"></i>
                <span>{{ __('messages.bed_types') }}</span>
            </a>
        </li>
        @endmodule
        @module('Beds',$modules)
        <li class="nav-item side-menus {{ Request::is('beds*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('beds.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.beds') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-procedures"></i>
                <span>{{ __('messages.beds') }}</span>
            </a>
        </li>
        @endmodule
        @module('Bed Assigns',$modules)
        <li class="nav-item side-menus {{ Request::is('bed-assigns*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('bed-assigns.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.bed_assigns') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="fas nav-icon fa-user-plus"></i>
                <span>{{ __('messages.bed_assigns') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

@module('Notice Boards',$modules)
<li class="nav-item side-menus {{ Request::is('employee/notice-board*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/notice-board') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.notice_boards') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-clipboard"></i>
        <span>{{ __('messages.notice_boards') }}</span>
    </a>
</li>
@endmodule
@module('My Payrolls',$modules)
<li class="nav-item side-menus {{ Request::is('employee/payroll') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('payroll') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.my_payrolls') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-chart-pie"></i>
        <span>{{ __('messages.my_payrolls') }}</span>
    </a>
</li>
@endmodule
{{-- Live Meeting --}}
@module('Live Meetings',$modules)
<li class="nav-item side-menus {{ Request::is('live-meeting*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('live.meeting.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.live_meetings') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-file-video"></i>
        <span>{{ __('messages.live_meetings') }}</span>
    </a>
</li>
@endmodule

@endrole

@role('Lab Technician')
@module('Doctors',$modules)
<li class="nav-item side-menus {{ Request::is('employee/doctor*') ? 'active' : '' }} }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/doctor') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.doctors') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-user-md"></i>
        <span>{{ __('messages.doctors') }}</span>
    </a>
</li>
@endmodule
{{-- Medicines--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.medicines') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-capsules"></i>
        {{ __('messages.medicines') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Medicine Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('categories.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicine_categories') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-pills"></i>
                <span>{{ __('messages.medicine_categories') }}</span>
            </a>
        </li>
        @endmodule
        @module('Medicine Brands',$modules)
        <li class="nav-item side-menus {{ Request::is('brands*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('brands.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicine_brands') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-bold"></i>
                <span>{{ __('messages.medicine_brands') }}</span>
            </a>
        </li>
        @endmodule
        @module('Medicines',$modules)
        <li class="nav-item side-menus {{ Request::is('medicines*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('medicines.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.medicines') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-capsules"></i>
                <span>{{ __('messages.medicines') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>
{{-- Blood Bank dropdown --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.blood_bank') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-tint"></i>
        {{ __('messages.blood_bank') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Blood Banks',$modules)
        <li class="nav-item side-menus {{ Request::is('blood-banks*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('blood-banks.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.blood_banks') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-hospital"></i>
                <span>{{ __('messages.blood_banks') }}</span>
            </a>
        </li>
        @endmodule
        @module('Blood Donors',$modules)
        <li class="nav-item side-menus {{ Request::is('blood-donors*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('blood-donors.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.blood_donors') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-award"></i>
                <span>{{ __('messages.blood_donors') }}</span>
            </a>
        </li>
        @endmodule
        @module('Blood Donations',$modules)
        <li class="nav-item side-menus {{ Request::is('blood-donations*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('blood-donations.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.blood_donations') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-hand-holding-heart"></i>
                <span>{{ __('messages.blood_donations') }}</span>
            </a>
        </li>
        @endmodule
        @module('Blood Issues',$modules)
        <li class="nav-item side-menus {{ Request::is('blood-issues*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('blood-issues.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.blood_issues') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-bong"></i>
                <span>{{ __('messages.blood_issues') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>
{{--Diagnosis Test--}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.patient_diagnosis_test.diagnosis') }}" data-delay='{"show":"500", "hide":"50"}'
       data-trigger="hover">
        <i class="nav-icon fas fa-diagnoses"></i>
        {{ __('messages.patient_diagnosis_test.diagnosis') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Diagnosis Categories',$modules)
        <li class="nav-item side-menus {{ Request::is('diagnosis-categories*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('diagnosis.category.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.diagnosis_category.diagnosis_categories')}}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-diagnoses"></i>
                <span>{{__('messages.diagnosis_category.diagnosis_categories')}}</span>
            </a>
        </li>
        @endmodule
        @module('Diagnosis Tests',$modules)
        <li class="nav-item side-menus {{ Request::is('patient-diagnosis-test*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('patient.diagnosis.test.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.patient_diagnosis_test.diagnosis_test') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-file-medical"></i>
                <span>{{ __('messages.patient_diagnosis_test.diagnosis_test') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

@module('Radiology Tests',$modules)
<li class="nav-item side-menus {{ Request::is('radiology-tests*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('radiology.test.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.radiology_tests') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-vial"></i>
        <span>{{ __('messages.radiology_tests') }}</span>
    </a>
</li>
@endmodule
@module('Pathology Tests',$modules)
<li class="nav-item side-menus {{ Request::is('pathology-tests*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('pathology.test.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.pathology_tests') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-vials"></i>
        <span>{{ __('messages.pathology_tests') }}</span>
    </a>
</li>
@endmodule
@module('Notice Boards',$modules)
<li class="nav-item side-menus {{ Request::is('employee/notice-board*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/notice-board') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.notice_boards') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-clipboard"></i>
        <span>{{ __('messages.notice_boards') }}</span>
    </a>
</li>
@endmodule
@module('My Payrolls',$modules)
<li class="nav-item side-menus {{ Request::is('employee/payroll') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('payroll') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.my_payrolls') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-chart-pie"></i>
        <span>{{ __('messages.my_payrolls') }}</span>
    </a>
</li>
@endmodule
{{-- Live Meeting --}}
@module('Live Meetings',$modules)
<li class="nav-item side-menus {{ Request::is('live-meeting*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('live.meeting.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.live_meetings') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-file-video"></i>
        <span>{{ __('messages.live_meetings') }}</span>
    </a>
</li>
@endmodule
@endrole

@role('Accountant')
{{-- Account Manager dropdown --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.account_manager') }}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fab fa-adn"></i>
        {{ __('messages.account_manager') }}
    </a>
    <ul class="nav-dropdown-items">
        @module('Accounts',$modules)
        <li class="nav-item side-menus {{ Request::is('accounts*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('accounts.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.accounts') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-piggy-bank"></i>
                <span>{{ __('messages.accounts') }}</span>
            </a>
        </li>
        @endmodule
        @module('Employee Payrolls',$modules)
        <li class="nav-item side-menus {{ Request::is('employee-payrolls*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('employee-payrolls.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.employee_payrolls') }}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-receipt"></i>
                <span>{{ __('messages.employee_payrolls') }}</span>
            </a>
        </li>
        @endmodule
        @module('Invoices',$modules)
        <li class="nav-item side-menus {{ Request::is('invoices*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('invoices.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.invoices') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon  fas fa-file-invoice"></i>
                <span>{{ __('messages.invoices') }}</span>
            </a>
        </li>
        @endmodule
        @module('Payments',$modules)
        <li class="nav-item side-menus {{ Request::is('payments*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('payments.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.payments') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon far fa-credit-card"></i>
                <span>{{ __('messages.payments') }}</span>
            </a>
        </li>
        @endmodule
        @module('Bills',$modules)
        <li class="nav-item side-menus {{ Request::is('bills*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('bills.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{ __('messages.bills') }}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fa fa-rupee-sign"></i>
                <span>{{ __('messages.bills') }}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>

{{-- Services --}}
@module('Services',$modules)
<li class="nav-item side-menus {{ Request::is('services*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('services.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.services') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-box"></i>
        <span>{{ __('messages.services') }}</span>
    </a>
</li>
@endmodule

{{-- Finance --}}
<li class="nav-item side-menus nav-dropdown">
    <a class="nav-link nav-dropdown-toggle menu-text-wrap" href="#" data-toggle="tooltip" data-placement="bottom"
       title="{{__('messages.finance')}}" data-delay='{"show":"500", "hide":"50"}' data-trigger="hover">
        <i class="nav-icon fas fa-money-bill"></i>
        {{__('messages.finance')}}
    </a>
    <ul class="nav-dropdown-items">
        @module('Income',$modules)
        <li class="nav-item side-menus {{ Request::is('incomes*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('incomes.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.incomes.incomes')}}"
               data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-wallet"></i>
                <span>{{__('messages.incomes.incomes')}}</span>
            </a>
        </li>
        @endmodule
        @module('Expense',$modules)
        <li class="nav-item side-menus {{ Request::is('expenses*') ? 'active' : '' }}">
            <a class="nav-link menu-text-wrap" href="{{ route('expenses.index') }}" data-toggle="tooltip"
               data-placement="bottom" title="{{__('messages.expenses')}}" data-delay='{"show":"500", "hide":"50"}'>
                <i class="nav-icon fas fa-money-check"></i>
                <span>{{__('messages.expenses')}}</span>
            </a>
        </li>
        @endmodule
    </ul>
</li>
@module('Notice Boards',$modules)
<li class="nav-item side-menus {{ Request::is('employee/notice-board*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/notice-board') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.notice_boards') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-clipboard"></i>
        <span>{{ __('messages.notice_boards') }}</span>
    </a>
</li>
@endmodule
{{-- SMS --}}
@module('SMS',$modules)
<li class="nav-item side-menus {{ Request::is('sms*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('sms.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.sms.sms') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa fa-sms"></i>
        <span>{{ __('messages.sms.sms') }}</span>
    </a>
</li>
@endmodule
{{-- Live Meeting --}}
@module('Live Meetings',$modules)
<li class="nav-item side-menus {{ Request::is('live-meeting*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('live.meeting.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.live_meetings') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-file-video"></i>
        <span>{{ __('messages.live_meetings') }}</span>
    </a>
</li>
@endmodule
@module('My Payrolls',$modules)
<li class="nav-item side-menus {{ Request::is('employee/payroll') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('payroll') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.my_payrolls') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-chart-pie"></i>
        <span>{{ __('messages.my_payrolls') }}</span>
    </a>
</li>
@endmodule
@endrole

@role('Patient')
@module('Patient Cases',$modules)
<li class="nav-item side-menus {{ Request::is('patient/my-cases*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('patient/my-cases*') ? 'active' : '' }} menu-text-wrap"
       href="{{ url('patient/my-cases') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.patients_cases') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-briefcase-medical"></i>
        <span>{{ __('messages.patients_cases') }}</span>
    </a>
</li>
@endmodule
@module('Patient Admissions',$modules)
<li class="nav-item side-menus {{ Request::is('employee/patient-admissions*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/patient-admissions') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.patient_admissions') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-history"></i>
        <span>{{ __('messages.patient_admissions') }}</span>
    </a>
</li>
@endmodule
@module('Prescriptions',$modules)
<li class="nav-item side-menus {{ Request::is('patient/my-prescriptions*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('prescriptions.list') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.prescriptions') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-prescription"></i>
        <span>{{ __('messages.prescriptions') }}</span>
    </a>
</li>
@endmodule
@module('IPD Patients',$modules)
<li class="nav-item side-menus {{ Request::is('patient/my-ipds*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('patient.ipd') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.ipd_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-notes-medical"></i>
        <span>{{ __('messages.ipd_patients') }}</span>
    </a>
</li>
@endmodule
@module('OPD Patients',$modules)
<li class="nav-item side-menus {{ Request::is('opds*') || Request::is('patient/my-opds') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('patient.opd') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.opd_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-stethoscope"></i>
        <span>{{ __('messages.opd_patients') }}</span>
    </a>
</li>
@endmodule

@module('Vaccinated Patients',$modules)
<li class="nav-item side-menus {{ Request::is('patient/my-vaccinated*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('patient.vaccinated') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.vaccinated_patients') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-head-side-mask"></i>
        <span>{{ __('messages.vaccinated_patients') }}</span>
    </a>
</li>
@endmodule
{{--Diagnosis test Report--}}
@module('Diagnosis Tests',$modules)
<li class="nav-item side-menus {{ Request::is('employee/patient-diagnosis-test*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/patient-diagnosis-test') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.patient_diagnosis_test.diagnosis_test') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-file-medical"></i>
        <span>{{ __('messages.patient_diagnosis_test.diagnosis_test') }}</span>
    </a>
</li>
@endmodule

{{-- Documents--}}
@module('Documents',$modules)
<li class="nav-item side-menus {{ Request::is('documents*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('documents*') ? 'active' : '' }} menu-text-wrap"
       href="{{ route('documents.index') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.documents') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-file"></i>
        <span>{{ __('messages.documents') }}</span>
    </a>
</li>
@endmodule
@module('Appointments',$modules)
<li class="nav-item side-menus {{ Request::is('appointments*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('appointments*') ? 'active' : '' }} menu-text-wrap"
       href="{{ route('appointments.index') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.appointments') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-calendar-check"></i>
        <span>{{ __('messages.appointments') }}</span>
    </a>
</li>
@endmodule
@module('Invoices',$modules)
<li class="nav-item side-menus {{ Request::is('employee/invoices*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/invoices') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.invoices') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fas fa-file-invoice"></i>
        <span>{{ __('messages.invoices') }}</span>
    </a>
</li>
@endmodule
@module('Bills',$modules)
<li class="nav-item side-menus {{ Request::is('employee/bills*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ url('employee/bills') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.bills') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-rupee-sign"></i>
        <span>{{ __('messages.bills') }}</span>
    </a>
</li>
@endmodule
@module('Notice Boards',$modules)
<li class="nav-item side-menus {{ Request::is('employee/notice-board*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('employee/notice-board*') ? 'active' : '' }} menu-text-wrap"
       href="{{ url('employee/notice-board') }}" data-toggle="tooltip" data-placement="bottom"
       title="{{ __('messages.notice_boards') }}" data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-clipboard"></i>
        <span>{{ __('messages.notice_boards') }}</span>
    </a>
</li>
@endmodule
{{-- Live Consultation --}}
@module('Live Consultations',$modules)
<li class="nav-item side-menus {{ Request::is('live-consultation*') ? 'active' : '' }}">
    <a class="nav-link menu-text-wrap" href="{{ route('live.consultation.index') }}" data-toggle="tooltip"
       data-placement="bottom" title="{{ __('messages.live_consultations') }}"
       data-delay='{"show":"500", "hide":"50"}'>
        <i class="nav-icon fa fa-video"></i>
        <span>{{ __('messages.live_consultations') }}</span>
    </a>
</li>
@endmodule
@endrole
