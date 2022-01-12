<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('name', __('messages.bed_assign.bed').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $bed->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bed_type', __('messages.bed.bed_type').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $bed->bedType->title }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('bed_id', __('messages.bed.bed_id').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $bed->bed_id }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('charge', __('messages.bed.charge').(':'), ['class' => 'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($bed->charge,2) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('available', __('messages.bed.available').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ ($bed->is_available) ? 'Yes' : 'No' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('description', __('messages.bed.description').(':'), ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($bed->description) ? nl2br(e($bed->description)) : 'N/A' !!}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($bed->created_at)) }}">{{ $bed->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($bed->updated_at)) }}">{{ $bed->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.bed_assign.bed_assigns') }}</h4>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive viewList">
            <table id="bedsAssigns" class="display table table-responsive-sm table-striped table-bordered">
                <thead>
                <tr>
                    <th class="w-15">{{ __('messages.case.patient') }}</th>
                    <th class="w-15  text-center">{{ __('messages.bed_assign.case_id') }}</th>
                    <th class="w-15">{{ __('messages.bed_assign.assign_date') }}</th>
                    <th class="w-15">{{ __('messages.bed_assign.discharge_date') }}</th>
                    <th class="w-10 text-center">{{ __('messages.common.status') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bedAssigns as $bedAssign)
                    <tr>
                        <td>
                            <a href="{{ url('patients', $bedAssign->patient_id) }}">{{ $bedAssign->patient->user->full_name }}</a>
                        </td>
                        <td class="text-center">{{ $bedAssign->case_id }}</td>
                        <td>{{ date('jS M, Y g:i A', strtotime($bedAssign->assign_date)) }}</td>
                        <td>{{ !empty($bedAssign->discharge_date)?date('jS M, Y g:i A', strtotime($bedAssign->discharge_date)):'N/A' }}</td>
                        <td class="text-center">{{ ($bedAssign->status) ? __('messages.bed_assign.assigned') : __('messages.bed_assign.not_assigned') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
