<?php

namespace App\Http\Controllers;

use App\Exports\RadiologyTestExport;
use App\Http\Requests\CreateRadiologyTestRequest;
use App\Http\Requests\UpdateRadiologyTestRequest;
use App\Models\Charge;
use App\Models\RadiologyTest;
use App\Queries\RadiologyTestDataTable;
use App\Repositories\RadiologyTestRepository;
use DataTables;
use Exception;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RadiologyTestController extends AppBaseController
{
    /** @var RadiologyTestRepository */
    private $radiologyTestRepository;

    public function __construct(RadiologyTestRepository $radiologyTestRepo)
    {
        $this->radiologyTestRepository = $radiologyTestRepo;
    }

    /**
     * Display a listing of the RadiologyTest.
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
            return Datatables::of((new RadiologyTestDataTable())->get())->make(true);
        }

        return view('radiology_tests.index');
    }

    /**
     * Show the form for creating a new RadiologyTest.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data = $this->radiologyTestRepository->getRadiologyAssociatedData();

        return view('radiology_tests.create', compact('data'));
    }

    /**
     * Store a newly created RadiologyTest in storage.
     *
     * @param  CreateRadiologyTestRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CreateRadiologyTestRequest $request)
    {
        $input = $request->all();
        $input['standard_charge'] = removeCommaFromNumbers($input['standard_charge']);
        $input['report_days'] = ! empty($input['report_days']) ? $input['report_days'] : null;
        $input['subcategory'] = ! empty($input['subcategory']) ? $input['subcategory'] : null;
        $this->radiologyTestRepository->create($input);
        Flash::success('Radiology Test saved successfully.');

        return redirect(route('radiology.test.index'));
    }

    /**
     * Display the specified RadiologyTest.
     *
     * @param  RadiologyTest  $radiologyTest
     *
     * @return Factory|View
     */
    public function show(RadiologyTest $radiologyTest)
    {
        return view('radiology_tests.show', compact('radiologyTest'));
    }

    /**
     * Show the form for editing the specified RadiologyTest.
     *
     * @param  RadiologyTest  $radiologyTest
     *
     * @return Factory|View
     */
    public function edit(RadiologyTest $radiologyTest)
    {
        $data = $this->radiologyTestRepository->getRadiologyAssociatedData();

        return view('radiology_tests.edit', compact('radiologyTest', 'data'));
    }

    /**
     * Update the specified RadiologyTest in storage.
     *
     * @param  RadiologyTest  $radiologyTest
     * @param  UpdateRadiologyTestRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update(RadiologyTest $radiologyTest, UpdateRadiologyTestRequest $request)
    {
        $input = $request->all();
        $input['standard_charge'] = removeCommaFromNumbers($input['standard_charge']);
        $input['report_days'] = ! empty($input['report_days']) ? $input['report_days'] : null;
        $input['subcategory'] = ! empty($input['subcategory']) ? $input['subcategory'] : null;
        $this->radiologyTestRepository->update($input, $radiologyTest->id);
        Flash::success('Radiology Test updated successfully.');

        return redirect(route('radiology.test.index'));
    }

    /**
     * Remove the specified RadiologyTest from storage.
     *
     * @param  RadiologyTest  $radiologyTest
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(RadiologyTest $radiologyTest)
    {
        $radiologyTest->delete();

        return $this->sendSuccess('Radiology Test deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getStandardCharge($id)
    {
        $standardCharges = Charge::where('charge_category_id', $id)->value('standard_charge');

        return $this->sendResponse($standardCharges, 'StandardCharge retrieved successfully.');
    }

    /**
     * @return BinaryFileResponse
     */
    public function radiologyTestExport()
    {
        return Excel::download(new RadiologyTestExport, 'radiology-tests-'.time().'.xlsx');
    }
}
