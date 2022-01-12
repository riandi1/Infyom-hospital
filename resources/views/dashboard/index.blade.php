@extends('layouts.app')
@section('title')
    {{ __('messages.dashboard.dashboard') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mt-2 widgets">
            @if($modules['Invoices'] == true)
                {{-- Invoices Widget --}}
                <div class="col-xl-3 col-sm-6 py-2">
                    <a href="{{ route('invoices.index') }}">
                        <div class="card card-1 text-white h-100">
                            <div class="card-body card-1">
                                <div class="rotate">
                                    <i class="fa fa-money-check fa-4x"></i>
                                </div>
                                <h5 class="mb-5">{{ __('messages.dashboard.total_invoices') }}</h5>
                                <h3 class="amount-position">{{getCurrencySymbol()}} {{ formatCurrency($data['invoiceAmount']) }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if($modules['Bills'])
                {{-- Bills Widget --}}
                <div class="col-xl-3 col-sm-6 py-2">
                    <a href="{{ route('bills.index') }}">
                        <div class="card text-white card-2 h-100">
                            <div class="card-body card-2">
                                <div class="rotate">
                                    <i class="fa fa-money-bill fa-4x"></i>
                                </div>
                                <h5 class="mb-5">{{ __('messages.dashboard.total_bills') }}</h5>
                                <h3 class="amount-position">{{getCurrencySymbol()}} {{ formatCurrency($data['billAmount']) }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if($modules['Payments'] == true)
                {{-- Payments Widget --}}
                <div class="col-xl-3 col-sm-6 py-2">
                    <a href="{{ route('payments.index') }}">
                        <div class="card text-white card-3 h-100">
                            <div class="card-body card-3">
                                <div class="rotate">
                                    <i class="fas fa-money-bill-wave fa-4x"></i>
                                </div>
                                <h5 class="mb-5">{{ __('messages.dashboard.total_payments') }}</h5>
                                <h3 class="amount-position">{{getCurrencySymbol()}} {{ formatCurrency($data['paymentAmount']) }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if($modules['Advance Payments'] == true)
                {{-- Advance Payments Widget --}}
                <div class="col-xl-3 col-sm-6 py-2">
                    <a href="{{ route('advanced-payments.index') }}">
                        <div class="card text-white card-4 h-100">
                            <div class="card-body card-4">
                                <div class="rotate">
                                    <i class="fas fa-money-bill-alt fa-4x"></i>
                                </div>
                                <h5 class="mb-5">{{ __('messages.dashboard.total_advance_payments') }}</h5>
                                <h3 class="amount-position">{{getCurrencySymbol()}} {{ formatCurrency($data['advancePaymentAmount']) }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if($modules['Doctors'] == true)
                {{-- Doctors Widget --}}
                <div class="col-xl-3 col-sm-6 py-2">
                    <a href="{{ route('doctors.index') }}">
                        <div class="card text-white card-5 h-100">
                            <div class="card-body card-5">
                                <div class="rotate">
                                    <i class="fas fa-user-md fa-4x"></i>
                                </div>
                                <h5 class="mb-5">{{ __('messages.dashboard.doctors') }}</h5>
                                <h3 class="amount-position">{{ $data['doctors'] }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endif

                @if($modules['Patients'] == true)
                    {{-- Patients Widget --}}
                    <div class="col-xl-3 col-sm-6 py-2">
                        <a href="{{ route('patients.index') }}">
                            <div class="card text-white card-6 h-100">
                                <div class="card-body card-6">
                                    <div class="rotate">
                                        <i class="fas fa-user fa-4x"></i>
                                    </div>
                                    <h5 class="mb-5">{{ __('messages.dashboard.patients') }}</h5>
                                    <h3 class="amount-position">{{ $data['patients'] }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endif

            @if($modules['Nurses'] == true)
                {{-- Nurses Widget --}}
                <div class="col-xl-3 col-sm-6 py-2">
                    <a href="{{ route('nurses.index') }}">
                        <div class="card text-white card-6 h-100">
                            <div class="card-body card-6">
                                <div class="rotate">
                                    <i class="fas fa-user-nurse fa-4x"></i>
                                </div>
                                <h5 class="mb-5">{{ __('messages.nurses') }}</h5>
                                <h3 class="amount-position">{{ $data['nurses'] }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if($modules['Beds'] == true)
                {{-- Avaiable Beds Widget --}}
                <div class="col-xl-3 col-sm-6 py-2">
                    <a href="{{ route('beds.index') }}">
                        <div class="card text-white card-7 h-100">
                            <div class="card-body card-7">
                                <div class="rotate">
                                    <i class="fas fa-bed fa-4x"></i>
                                </div>
                                <h5 class="mb-5">{{ __('messages.dashboard.available_beds') }}</h5>
                                <h3 class="amount-position">{{ $data['availableBeds'] }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>
        <div class="row mt-2">
            <div class="col-lg-6">
                <h3 class="page__heading mb-2">{{ __('messages.enquiries') }}</h3>
                <div class="col-lg-12 p-0">
                    <table class="display table text-center table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>{{ __('messages.enquiry.name') }}</th>
                            <th>{{ __('messages.enquiry.email') }}</th>
                            <th>{{ __('messages.common.created_on') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['enquiries'] as $enquiry)
                            <tr>
                                <td>
                                    <a href="{{ route('enquiry.show' , $enquiry->id) }}">
                                        {{ $enquiry->full_name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $enquiry->email }}
                                </td>
                                <td>
                                    {{ date('jS M,Y', strtotime($enquiry->created_at)) }}
                                </td>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">{{ __('messages.dashboard.no_enquiries_yet') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="page__heading mb-2">{{ __('messages.dashboard.notice_boards') }}</h3>
                <div class="col-lg-12 p-0">
                    <table class="display table text-center table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>{{ __('messages.dashboard.title') }}</th>
                            <th>{{ __('messages.common.created_on') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['noticeBoards'] as $noticeBoard)
                            <tr>
                                <td>
                                    <a href="{{ route('notice-boards.show' , $noticeBoard->id) }}">
                                        {{ $noticeBoard->title }}
                                    </a>
                                </td>
                                <td>
                                    {{ date('jS M,Y', strtotime($noticeBoard->created_at)) }}
                                </td>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">{{ __('messages.dashboard.no_notice_yet') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--Income & Expense Chart--}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 pt-2">
                                <h5>{{ __('messages.dashboard.income_and_expense_report') }}</h5>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div id="time_range" class="time_range float-right">
                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>&nbsp;&nbsp;<span></span>
                                    <b class="caret"></b>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <div id="income-expense-report-container" class="pt-2 chart-responsive">
                                <canvas id="daily-work-report"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let incomeExpenseReportUrl = "{{route('income-expense-report')}}";
        let currentCurrencyName = "{{ getCurrencySymbol()}}";
        let curencies = JSON.parse('@json($data['currency'])');
        let income_and_expense_reports = "{{ __('messages.dashboard.income_and_expense_reports') }}";
    </script>
    <script src="{{mix('assets/js/dashboard/dashboard.js')}}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
@endsection
