<?php

namespace App\Http\Controllers;

use App\Models\AdvancedPayment;
use App\Models\Bed;
use App\Models\Bill;
use App\Models\Doctor;
use App\Models\Enquiry;
use App\Models\Invoice;
use App\Models\Module;
use App\Models\NoticeBoard;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Setting;
use App\Repositories\DashboardRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends AppBaseController
{
    private $dashboardRepository;

    /**
     * Create a new controller instance.
     *
     * @param  DashboardRepository  $dashboardRepository
     */
    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->middleware('auth');
        $this->dashboardRepository = $dashboardRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return Factory|View
     */
    public function dashboard()
    {
        $data['invoiceAmount'] = Invoice::sum('amount');
        $data['billAmount'] = Bill::sum('amount');
        $data['paymentAmount'] = Payment::sum('amount');
        $data['advancePaymentAmount'] = AdvancedPayment::sum('amount');
        $data['doctors'] = Doctor::count();
        $data['patients'] = Patient::count();
        $data['nurses'] = Nurse::count();
        $data['availableBeds'] = Bed::whereIsAvailable(1)->count();
        $data['noticeBoards'] = NoticeBoard::take(10)->orderBy('id', 'DESC')->get();
        $data['enquiries'] = Enquiry::where('status', 0)->latest()->take(10)->get();
        $data['currency'] = Setting::CURRENCIES;
        $modules = Module::pluck('is_active', 'name')->toArray();

        return view('dashboard.index', compact('data', 'modules'));
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function incomeExpenseReport(Request $request)
    {
        $data = $this->dashboardRepository->getIncomeExpenseReport($request->all());

        return $this->sendResponse($data, 'Income and Expense report retrieved successfully.');
    }
}
