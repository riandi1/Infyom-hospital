<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('name', __('messages.insurance.insurance').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $insurance->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('service_tax', __('messages.insurance.service_tax').(':'),['class'=>'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($insurance->service_tax, 2)  }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('discount', __('messages.insurance.discount').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ isset($insurance->discount) ? $insurance->discount.'%':'N/A'  }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('insurance_no', __('messages.insurance.insurance_no').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $insurance->insurance_no  }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('insurance_code', __('messages.insurance.insurance_code').(':'),['class'=>'font-weight-bold']) }}
            <p>{{ $insurance->insurance_code  }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('hospital_rate', __('messages.insurance.hospital_rate').(':'),['class'=>'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($insurance->hospital_rate, 2) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('total', __('messages.common.total').(':'),['class'=>'font-weight-bold']) }}
            <p><b>{{ getCurrencySymbol() }}</b> {{ number_format($insurance->total, 2) }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ ($insurance->status === 1) ? 'Active' : 'Deactive' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('remark', __('messages.insurance.remark').(':'),['class'=>'font-weight-bold']) }}
            <p>{!! !empty($insurance->remark) ? nl2br(e($insurance->remark)):'N/A'  !!}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'),['class'=>'font-weight-bold']) }}<br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($insurance->created_at)) }}">{{ $insurance->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'),['class'=>'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($insurance->updated_at)) }}">{{ $insurance->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
<div class="mt-2">
    {{ Form::label('disease_details', __('messages.insurance.disease_details'),['class'=>'font-weight-bold']) }}
    <div class="com-sm-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th>{{ __('messages.insurance.diseases_name') }}</th>
                <th class="text-right">{{ __('messages.insurance.diseases_charge') }}</th>
            </tr>
            </thead>
            <tbody class="bill-item-container">
            @foreach($diseases as $index => $disease)
                <tr>
                    <td class="text-center w-5">{{ $loop->iteration }}</td>
                    <td>
                        {{ $disease->disease_name }}
                    </td>
                    <td class="table__qty text-right">
                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($disease->disease_charge, 2) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
