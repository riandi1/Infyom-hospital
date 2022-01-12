<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('title', __('messages.appointment.doctor_department').':', ['class' => 'font-weight-bold']) }}
            <p>{{ $doctorDepartment->title }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($doctorDepartment->created_at)) }}">{{ $doctorDepartment->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($doctorDepartment->updated_at)) }}">{{ $doctorDepartment->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.doctor_department.description').':', ['class' => 'font-weight-bold']) }}
            <p>{!! (!empty($doctorDepartment->description)) ? nl2br(e($doctorDepartment->description)) : __('messages.common.n/a') !!}</p>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.case.doctor') }}</h4>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive viewList">
            <table id="doctorsDepartmentList" class="display table table-bordered table-responsive-sm d-table-con">
                <thead>
                <tr>
                    <th>{{ __('messages.case.doctor') }}</th>
                    <th>{{ __('messages.doctor.specialist') }}</th>
                    <th>{{ __('messages.user.email') }}</th>
                    <th>{{ __('messages.user.phone') }}</th>
                    <th>{{ __('messages.user.qualification') }}</th>
                    <th class="text-center">{{ __('messages.common.status') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->user->full_name }}</td>
                        <td>{{ $doctor->specialist }}</td>
                        <td>{{ $doctor->user->email }}</td>
                        <td>{{ (!empty($doctor->user->phone)) ? $doctor->user->phone : __('messages.common.n/a') }}</td>
                        <td>{{ $doctor->user->qualification }}</td>
                        <td class="text-center">{{ ($doctor->user->status) ? __('messages.common.active') : __('messages.common.de_active') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
