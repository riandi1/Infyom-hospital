<div class="row view-spacer">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('title', __('messages.bed.bed_type').(':'), ['class' => 'font-weight-bold']) }}
            <p>{{ $bedType->title }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('description', __('messages.bed_type.description').(':'), ['class' => 'font-weight-bold']) }}
            <p>{!! !empty($bedType->description)?nl2br(e($bedType->description)):'N/A' !!}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($bedType->created_at)) }}">{{ $bedType->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'font-weight-bold']) }}
            <br>
            <span data-toggle="tooltip" data-placement="right"
                  title="{{ date('jS M, Y', strtotime($bedType->updated_at)) }}">{{ $bedType->updated_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4>{{ __('messages.bed.beds') }}</h4>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive viewList">
            <table id="beds" class="display table table-responsive-sm table-striped table-bordered">
                <thead>
                <tr>
                    <th class="w-20">{{ __('messages.bed_assign.bed') }}</th>
                    <th class="w-60">{{ __('messages.bed.description') }}</th>
                    <th class="w-5 text-right">{{ __('messages.bed.charge') }}</th>
                    <th class="w-10 text-center">{{ __('messages.bed.available') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($beds as $bed)
                    <tr>
                        <td><a href="{{ url('beds',$bed->id) }}">{{ $bed->name }}</a></td>
                        <td class="text-truncate"
                            style="max-width: 150px">{!! !empty($bed->description)?nl2br(e($bed->description)):'N/A' !!}</td>
                        <td class="text-right"><b>{{ getCurrencySymbol() }}</b> {{ number_format($bed->charge, 2) }}
                        </td>
                        <td class="text-center">{{ ($bed->is_available) ? __('messages.common.yes') : __('messages.common.no') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
