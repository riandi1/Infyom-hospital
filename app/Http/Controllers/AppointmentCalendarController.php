<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Repositories\AppointmentCalendarRepository;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class AppointmentCalendarController extends AppBaseController
{
    /** @var AppointmentCalendarRepository */
    private $appointmentCalendarRepository;

    public function __construct(AppointmentCalendarRepository $appointmentCalendarRepo)
    {
        $this->appointmentCalendarRepository = $appointmentCalendarRepo;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('appointment_calendars.index');
    }

    /**
     * @return JsonResponse
     */
    public function calendarList()
    {
        $appointments = $this->appointmentCalendarRepository->getAppointments();

        return $this->sendResponse($appointments, 'Appointment list retrieved successfully.');
    }

    /**
     * @param  Appointment  $appointment
     *
     * @return JsonResponse
     */
    public function getAppointmentDetails(Appointment $appointment)
    {
        $appointmentDetails['patient'] = $appointment->patient->user->full_name;
        $appointmentDetails['department'] = $appointment->doctor->department->title;
        $appointmentDetails['doctor'] = $appointment->doctor->user->full_name;
        $appointmentDetails['opdDate'] = Carbon::parse($appointment->opd_date)->format('jS M, Y g:i A');
        $appointmentDetails['problem'] = $appointment->problem;

        return $this->sendResponse($appointmentDetails, 'Appointment Retrieved Successfully.');
    }
}
