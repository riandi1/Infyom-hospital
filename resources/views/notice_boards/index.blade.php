@extends('layouts.app')
@section('title')
    {{ __('messages.notice_boards') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.notice_boards') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.notice_board.new') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('notice_boards.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('notice_boards.templates.templates')
        @include('notice_boards.create_modal')
        @include('notice_boards.edit_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let noticeBoardUrl = "{{url('notice-boards')}}";
        let noticeBoardCreateUrl = "{{route('notice-boards.store')}}";
    </script>
    <script src="{{ mix('assets/js/notice_boards/notice_boards.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/notice_boards/create-edit.js') }}"></script>
@endsection
