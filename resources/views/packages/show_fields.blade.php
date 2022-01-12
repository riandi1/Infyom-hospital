<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('name', __('messages.package.package').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $package->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('discount', __('messages.package.discount').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $package->discount }}%</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($package->created_at)) }}">{{ $package->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($package->updated_at)) }}">{{ $package->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', __('messages.package.description').(':'), ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($package->description)? nl2br(e($package->description)):'N/A'  !!}</p>
        </div>
    </div>
</div>

<div class="com-sm-12">
    <table class="table table-bordered table-responsive-sm d-table-con">
        <thead class="thead-dark">
        <tr>
            <th class="text-center">#</th>
            <th>{{ __('messages.package.service') }}</th>
            <th class="text-right">{{ __('messages.package.qty') }}</th>
            <th class="text-right">{{ __('messages.package.rate') }}</th>
            <th class="text-right">{{ __('messages.package.amount') }}</th>
        </tr>
        </thead>
        <tbody class="bill-item-container">
        @foreach($package->packageServicesItems as $index => $packageServiceItem)
            <tr>
                <td class="text-center w-5">{{ $index + 1 }}</td>
                <td>
                    {{ $packageServiceItem->service->name }}
                </td>
                <td class="table__qty text-right">
                    {{ $packageServiceItem->quantity }}
                </td>
                <td class="text-right">
                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($packageServiceItem->rate) }}
                </td>
                <td class="text-right"><b>{{ getCurrencySymbol() }}</b> {{ number_format($packageServiceItem->amount) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-sm-12 text-right p-0 font-weight-bold">
        {{ Form::label('total', __('messages.package.total_amount').(':')) }}
        (<b>{{ getCurrencySymbol() }}</b>)
        {{ number_format($package->total_amount,2) }}
    </div>
</div>
