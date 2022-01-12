<div class="row">

    @if(Auth::user()->hasRole('Doctor'))
        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
    @else
        <div class="form-group col-sm-8">
            {{ Form::label('doctor_name', __('messages.case.doctor').':') }}<label class="required">*</label>
            {{ Form::select('doctor_id',$data['doctors'], null, ['class' => 'form-control','required',
                                                'id' => 'doctorId','placeholder' => __('messages.schedule.select_doctor_name')]) }}
        </div>
    @endif
    @if(Auth::user()->hasRole('Doctor'))
        <div class="form-group col-sm-12">
            {{ Form::label('per_patient_time', __('messages.schedule.per_patient_time').':') }}<label
                    class="required">*</label>
            {{ Form::text('per_patient_time', null, ['id'=>'perPatientTime', 'class' => 'form-control', 'required','autocomplete' => 'off']) }}
        </div>
    @else
        <div class="form-group col-sm-4">
            {{ Form::label('per_patient_time', __('messages.schedule.per_patient_time').':') }}<label
                    class="required">*</label>
            {{ Form::text('per_patient_time', null, ['id'=>'perPatientTime', 'class' => 'form-control', 'required']) }}
        </div>
    @endif

    <div class="col-lg-12 col-md-12 col-sm-12 schedulesCon">
        <table class="schedules-table schedules-table-bordered">
            <thead class="schedules-table-theme">
            <th>{{ __('messages.schedule.available_on').':' }} <span class="required">*</span></th>
            <th>{{ __('messages.schedule.available_from').':' }} <span class="required">*</span></th>
            <th>{{ __('messages.schedule.available_to').':' }} <span class="required">*</span></th>
            <th class="text-center">{{ __('messages.common.action') }}</th>
            </thead>
            <tbody>
            @foreach($data['availableOn'] as $days)
                <tr>
                    <td class="schedules-table-td">
                        {{ Form::text('available_on[]', isset($scheduleDays)?$scheduleDays[$loop->iteration-1]->available_on:$days,
            ['class' => 'form-control availableOn','required','id' => 'availableOn-'.($loop->iteration-1),'readonly']) }}
                    </td>
                    <td class="schedules-table-td position-relative">
                        {{ Form::text('available_from[]', isset($scheduleDays)?$scheduleDays[$loop->iteration-1]->available_from:"00:00:00",                                       ['id'=>'availableFrom-'.($loop->iteration-1), 'class' => 'form-control availableFrom', 'required','autocomplete' => 'off']) }}
                    </td>
                    <td class="schedules-table-td position-relative">
                        {{ Form::text('available_to[]', isset($scheduleDays)?$scheduleDays[$loop->iteration-1]->available_to:"00:00:00",
            ['id'=>'availableTo-'.($loop->iteration-1), 'class' => 'form-control availableTo', 'required','autocomplete' => 'off']) }}
                    </td>
                    <td class="text-center schedules-table-td">
                        @if(!$loop->first)
                            <a title="copy-previous" class="btn action-btn btn-primary btn-sm copy-btn" href="#"
                               data-id="{{ $loop->iteration-1 }}">
                                <i class="fa fa-copy action-icon"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
