<table class="table table-striped table-bordered table-responsive-sm" id="appointmentsTbl">
    <thead>
    @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Doctor'))
        <th></th>
    @endif
    <th>{{ __('messages.case.patient') }}</th>
    <th>{{ __('messages.case.doctor') }}</th>
    <th>{{ __('messages.appointment.doctor_department') }}</th>
    <th>{{ __('messages.appointment.date') }}</th>
    <th>{{ __('messages.common.action') }}</th>
    </thead>
    <tbody>
    </tbody>
</table>
