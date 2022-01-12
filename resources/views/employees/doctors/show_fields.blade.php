<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('name', __('messages.case.doctor').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctor->user->full_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('email', __('messages.user.email').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctor->user->email }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone',  __('messages.user.phone').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($doctor->user->phone) ? $doctor->user->phone : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('designation', __('messages.user.designation').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctor->user->designation }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('department', __('messages.appointment.doctor_department').':', ['class' => 'font-weight-bold']) }}
            <p>{{ getDoctorDepartment($doctor->doctor_department_id) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('qualification', __('messages.user.qualification').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctor->user->qualification }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('blood_group', __('messages.user.blood_group').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($doctor->user->blood_group) ? $doctor->user->blood_group : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('dob', __('messages.user.dob').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($doctor->user->dob) ? \Carbon\Carbon::parse($doctor->user->dob)->format('jS M, Y') : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('gender', __('messages.user.gender').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctor->user->gender == 0 ? __('messages.user.male') : __('messages.user.female') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('specialist', __('messages.doctor.specialist').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctor->specialist }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':', ['class' => 'font-weight-bold']) }}
            <p>{{ ($doctor->user->status === 1) ? 'Active' : 'Deactive' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($doctor->created_at)) }}">{{ $doctor->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($doctor->updated_at)) }}">{{ $doctor->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
@if(!empty($doctor->address))
    <hr>
    <div class="row mt-3">
        <div class="col-md-12 mb-3">
            <h5>{{ __('messages.user.address_details') }}</h5>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('address1', __('messages.user.address1').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($doctor->address->address1) ? $doctor->address->address1 : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('address2', __('messages.user.address2').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($doctor->address->address2) ? $doctor->address->address2 : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('city', __('messages.user.city').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($doctor->address->city) ? $doctor->address->city : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('zip', __('messages.user.zip').':', ['class' => 'font-weight-bold']) }}
                <p>{{ !empty($doctor->address->zip) ? $doctor->address->zip : __('messages.common.n/a') }}</p>
            </div>
        </div>
    </div>
@endif
