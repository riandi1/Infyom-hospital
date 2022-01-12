<div class="row view-spacer">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', __('messages.medicine.brand').':',['class'=>'font-weight-bold']) }}
            <p>{{ $brand->name }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', __('messages.user.email').':',['class'=>'font-weight-bold']) }}
            <p>{{ !empty($brand->email)?$brand->email:'N/A' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', __('messages.user.phone').':',['class'=>'font-weight-bold']) }}
            <p>{{ !empty($brand->phone)?$brand->phone:'N/A' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($brand->created_at)) }}">{{ $brand->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($brand->updated_at)) }}">{{ $brand->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.medicine.medicines') }}</h4>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive viewList">
            <table id="medicineBrands" class="display table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th class="w-10">{{ __('messages.medicine.category') }}</th>
                    <th class="w-15">{{ __('messages.medicine.medicine') }}</th>
                    <th class="w-10 text-right">{{ __('messages.medicine.selling_price') }}</th>
                    <th class="w-10 text-right">{{ __('messages.medicine.buying_price') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->category->name }}</td>
                        <td>{{ $medicine->name }}</td>
                        <td class="text-right">
                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($medicine->selling_price, 2) }}
                        </td>
                        <td class="text-right">
                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($medicine->buying_price, 2) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
