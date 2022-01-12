<div class="row view-spacer">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('name', __('messages.medicine.category').':',['class'=>'font-weight-bold']) }}
            <p>{{ $category->name }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('is_active', __('messages.common.status').':',['class'=>'font-weight-bold']) }}
            <p>{{ ($category->is_active == 1) ? __('messages.common.active') : __('messages.common.de_active') }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($category->created_at)) }}">{{ $category->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($category->updated_at)) }}">{{ $category->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.medicine.medicines') }}</h4>
    </div>
    <div class="col-lg-12">
        <div class=" viewList">
            <table id="medicineCategory" class="display table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th class="w-10">{{ __('messages.medicine.medicine') }}</th>
                    <th class="w-15">{{ __('messages.medicine.brand') }}</th>
                    <th class="w-50">{{ __('messages.medicine.description') }}</th>
                    <th class="w-10 text-right">{{ __('messages.medicine.selling_price') }}</th>
                    <th class="w-10 text-right">{{ __('messages.medicine.buying_price') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->name }}</td>
                        <td>{{ $medicine->brand->name }}</td>
                        <td>{!! !empty($medicine->description)?nl2br(e($medicine->description)):'N/A' !!}</td>
                        <td class="text-right">
                            <b>{{ getCurrencySymbol() }}</b> {{ number_format ($medicine->selling_price, 2) }}
                        </td>
                        <td class="text-right">
                            <b>{{ getCurrencySymbol() }}</b> {{ number_format ($medicine->buying_price, 2) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
