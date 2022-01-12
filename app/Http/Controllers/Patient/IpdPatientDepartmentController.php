<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\IpdPatientDepartment;
use App\Models\IpdPayment;
use App\Queries\Patients\IpdPatientDepartmentDataTable;
use App\Repositories\IpdBillRepository;
use App\Repositories\IpdPatientDepartmentRepository;
use DataTables;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IpdPatientDepartmentController extends Controller
{
    /** @var IpdPatientDepartmentRepository */
    private $ipdPatientDepartmentRepository;

    public function __construct(IpdPatientDepartmentRepository $ipdPatientDepartmentRepo)
    {
        $this->ipdPatientDepartmentRepository = $ipdPatientDepartmentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new IpdPatientDepartmentDataTable())->get())->make(true);
        }

        return view('ipd_patient_list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  IpdPatientDepartment  $ipdPatientDepartment
     *
     * @return Factory|View
     */
    public function show(IpdPatientDepartment $ipdPatientDepartment)
    {
        $paymentModes = IpdPayment::PAYMENT_MODES;
        $ipdPatientDepartmentRepository = \App::make(IpdBillRepository::class);
        $bill = $ipdPatientDepartmentRepository->getBillList($ipdPatientDepartment);

        return view('ipd_patient_list.show', compact('ipdPatientDepartment', 'paymentModes', 'bill'));
    }
}
