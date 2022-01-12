<div class="row view-spacer">
    <div class="col-md-3">
        <!-- Vehicle Number Field -->
        <div class="form-group">
            {{ Form::label('vehicle_number', __('messages.ambulance.vehicle_number').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $ambulance->vehicle_number }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <!-- Vehicle Model Field -->
        <div class="form-group">
            {{ Form::label('vehicle_model', __('messages.ambulance.vehicle_model').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $ambulance->vehicle_model }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <!-- Vehicle Type Field -->
        <div class="form-group">
            {{ Form::label('vehicle_type', __('messages.ambulance.vehicle_type').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $type[$ambulance->vehicle_type] }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <!-- Year Made Field -->
        <div class="form-group">
            {{ Form::label('year_made', __('messages.ambulance.year_made').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $ambulance->year_made }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <!-- Driver Name Field -->
        <div class="form-group">
            {{ Form::label('driver_name', __('messages.ambulance.driver_name').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $ambulance->driver_name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <!-- Driver License Field -->
        <div class="form-group">
            {{ Form::label('driver_license', __('messages.ambulance.driver_license').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $ambulance->driver_license }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <!-- Driver Contact Field -->
        <div class="form-group">
            {{ Form::label('driver_contact', __('messages.ambulance.driver_contact').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $ambulance->driver_contact }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <!-- Note Field -->
        <div class="form-group">
            {{ Form::label('note', __('messages.ambulance.note').(':'),['class'=>'font-weight-bold']) }}
            <p>{!! !empty($ambulance->note)?nl2br(e($ambulance->note)):'N/A' !!}</p>
        </div>
    </div>
    {{--    Is Available--}}
    <div class="col-md-3">
        <!-- Note Field -->
        <div class="form-group">
            {{ Form::label('is_available', __('messages.ambulance.is_available').(':'),['class'=>'font-weight-bold']) }}
            <p>{!! ($ambulance->is_available == 1 )? 'Available': 'Not available' !!}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($ambulance->created_at)) }}">{{ $ambulance->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($ambulance->updated_at)) }}">{{ $ambulance->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
