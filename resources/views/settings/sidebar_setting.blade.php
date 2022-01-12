@extends('settings.edit')
@section('title')
    {{ __('messages.sidebar_setting') }}
@endsection
@section('section')
    <div class="filter-container justify-content-end">
        <div class="mr-2">
            <label for="filter_status"
                   class="lbl-block mr-2"><b>{{ __('messages.common.status').":" }}</b></label>
            {{Form::select('status', $statusArr, null, ['id' => 'filter_status', 'class' => 'form-control status-filter w-25']) }}
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @include('settings.modules_table')
                </div>
            </div>
        </div>
    </div>
    @include('settings.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let isEdit = true;
        let moduleUrl = '{{ route('module.index') }}';
    </script>
    <script src="{{ mix('assets/js/settings/setting.js') }}"></script>
@endsection
