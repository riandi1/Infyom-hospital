<?php

namespace App\Repositories;

use App\Models\FrontSetting;
use Arr;

/**
 * Class FrontSettingRepository
 */
class FrontSettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'value',
        'type',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FrontSetting::class;
    }

    /**
     * @param $input
     */
    public function updateFrontSetting($input)
    {
        if (isset($input['about_us_image']) && ! empty($input['about_us_image'])) {
            /** @var FrontSetting $frontSetting */
            $frontSetting = FrontSetting::where('key', '=', 'about_us_image')->first();
            $frontSetting->clearMediaCollection(FrontSetting::PATH);
            $frontSetting->addMedia($input['about_us_image'])->toMediaCollection(FrontSetting::PATH,
                config('app.media_disc'));
            $frontSetting = $frontSetting->refresh();
            $frontSetting->update(['value' => $frontSetting->logo_url]);
        }

        $frontSettingInputArray = Arr::only($input, [
            'about_us_title', 'about_us_mission', 'about_us_description',
        ]);

        foreach ($frontSettingInputArray as $key => $value) {
            FrontSetting::where('key', '=', $key)->first()->update(['value' => $value]);
        }
    }
}
