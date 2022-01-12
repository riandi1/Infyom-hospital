<div class="alert alert-danger display-none"></div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('first_name',__('messages.user.first_name').':',['class' => 'font-weight-bold']) }}
        <p>{{ $userData->first_name }}</p>
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('last_name',__('messages.user.last_name').':',['class' => 'font-weight-bold']) }}
        <p>{{ $userData->last_name }}</p>
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('role_name',__('messages.sms.role').':',['class' => 'font-weight-bold']) }}
        <p>{{ $userData->roles->first()->name }}</p>
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('email',__('messages.user.email').':',['class' => 'font-weight-bold']) }}
        <p>{{ $userData->email }}</p>
    </div>
    <div class="form-group col-sm-6 myclass">
        {{ Form::label('Phone',__('messages.visitor.phone').':',['class' => 'font-weight-bold']) }}
        <p>{{ ($userData->phone=='')?  __('messages.common.n/a') : $userData->phone}}</p>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('gender', __('messages.user.gender').':',['class' => 'font-weight-bold']) }} &nbsp;<br>
            <p>{{ ($userData->gender == '0')? __('messages.user.male') : __('messages.user.female')}}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('dob', __('messages.user.dob').':',['class' => 'font-weight-bold']) }}
            <p>{{ ($userData->dob == '')? __('messages.common.n/a') : \Carbon\Carbon::parse($userData->dob)->format('jS M, Y') }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').':',['class' => 'font-weight-bold']) }}<br>
            <p>{{($userData->status=='1') ? __('messages.common.active') : __('messages.common.de_active') }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.created_at').':',['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($userData->created_at)) }}">{{ $userData->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.updated_at').':',['class' => 'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($userData->updated_at)) }}">{{ $userData->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
