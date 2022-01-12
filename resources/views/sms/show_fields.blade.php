<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('send_to', __('messages.sms.send_to').':', ['class' => 'font-weight-bold']) }}
            <p>{{ !empty($sms->user && $sms->user->full_name) ? $sms->user->full_name : __('messages.common.n/a') }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('role', __('messages.employee_payroll.role').':', ['class' => 'font-weight-bold']) }}
            <p>
                @if(isset($sms->user))
                    {{$sms->user->roles->pluck('name')->first()}}
                @else
                    {{ __('messages.common.n/a') }}
                @endif</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('phone_number',  __('messages.user.phone').':', ['class' => 'font-weight-bold']) }}
            <p>{{$sms->phone_number}}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('date',  __('messages.sms.date').':', ['class' => 'font-weight-bold']) }}
            <p>{{ \Carbon\Carbon::parse($sms->created_at)->format('jS M,Y g:i A') }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('send_by',  __('messages.sms.send_by').':', ['class' => 'font-weight-bold']) }}
            <p>{{$sms->sendBy->full_name}}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('message', __('messages.sms.message').':', ['class' => 'font-weight-bold']) }}
            <br>
            <td>
                @if($sms->message)
                    {!! nl2br(e($sms->message)) !!}
                @else
                    {{ __('messages.common.n/a') }}
                @endif</td>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($sms->created_at)) }}">{{ $sms->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($sms->updated_at)) }}">{{ $sms->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
