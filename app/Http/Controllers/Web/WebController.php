<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorDepartment;
use App\Models\FrontSetting;
use App\Models\NoticeBoard;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Repositories\AppointmentRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class WebController extends Controller
{
    /** @var  AppointmentRepository $appointmentRepository */
    private $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $doctorsDepartments = DoctorDepartment::take(6)->toBase()->get();
        $doctors = Doctor::with('department')->distinct()->take(6)->get();
        $todayNotice = NoticeBoard::whereDate('created_at', Carbon::today()->toDateTimeString())->latest()->first();
        $contactDetails = Setting::all()->pluck('value', 'key')->toArray();
        $testimonials = Testimonial::with('media')->get();

        return view('web.home.index',
            compact('doctorsDepartments', 'doctors', 'todayNotice', 'contactDetails', 'testimonials'));
    }

    /**
     * @return Factory|View
     */
    public function demo()
    {
        return \view('web.demo.index');
    }

    /**
     * @return Factory|View
     */
    public function modulesOfHms()
    {
        return \view('web.modules_of_hms.index');
    }

    /**
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function changeLanguage(Request $request)
    {
        Session::put('languageName', $request->input('languageName'));

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     */
    public function aboutUs()
    {
        $frontSetting = FrontSetting::whereType(FrontSetting::ABOUT_US)->pluck('value', 'key')->toArray();

        return view('web.home.about_us', compact('frontSetting'));
    }

    /**
     * @return Application|Factory|View
     */
    public function appointment()
    {
        $departments = $this->appointmentRepository->getDoctorDepartments();

        return view('web.home.appointment', compact('departments'));
    }
}
