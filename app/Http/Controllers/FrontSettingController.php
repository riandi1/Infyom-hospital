<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFrontSettingRequest;
use App\Models\FrontSetting;
use App\Repositories\FrontSettingRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class FrontSettingController
 */
class FrontSettingController extends AppBaseController
{
    /** @var FrontSettingRepository */
    private $frontSettingRepository;

    public function __construct(FrontSettingRepository $frontSettingRepository)
    {
        $this->frontSettingRepository = $frontSettingRepository;
    }

    /**
     * @param  Request  $request
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $frontSettings = FrontSetting::pluck('value', 'key')->toArray();
        $sectionName = ($request->section === null) ? 'about_us' : $request->section;

        return view("front_settings.$sectionName", compact('frontSettings', 'sectionName'));
    }

    /**
     * Update the specified Front Setting in storage.
     *
     * @param  UpdateFrontSettingRequest  $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateFrontSettingRequest $request)
    {
        $this->frontSettingRepository->updateFrontSetting($request->all());

        Flash::success('Front Setting updated successfully.');

        return redirect(route('front.settings.index'));
    }
}
