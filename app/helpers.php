<?php

use App\Models\BloodBank;
use App\Models\Department;
use App\Models\DoctorDepartment;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\PatientAdmission;
use App\Models\PatientCase;
use App\Models\Setting;
use App\Models\User;
use App\Models\VaccinatedPatients;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;
use Stripe\Stripe;

/**
 * @return int
 */
function getLoggedInUserId()
{
    return Auth::id();
}

/**
 * @return User
 */
function getLoggedInUser()
{
    return Auth::user();
}

/**
 * return avatar url.
 *
 * @return string
 */
function getAvatarUrl()
{
    return '//ui-avatars.com/api/';
}

/**
 * return avatar full url.
 *
 * @param  int  $userId
 * @param  string  $name
 *
 * @return string
 */
function getUserImageInitial($userId, $name)
{
    return getAvatarUrl()."?name=$name&size=100&rounded=true&color=fff&background=".getRandomColor($userId);
}

/**
 * return random color.
 *
 * @param  int  $userId
 *
 * @return string
 */
function getRandomColor($userId)
{
    $colors = ['329af0', 'fc6369', 'ffaa2e', '42c9af', '7d68f0'];
    $index = $userId % 5;

    return $colors[$index];
}

/**
 * @param $number
 *
 * @return string|string[]
 */
function removeCommaFromNumbers($number)
{
    return (gettype($number) == 'string' && ! empty($number)) ? str_replace(',', '', $number) : $number;
}

/**
 * @param  User  $user
 * @param  string  $image
 *
 * @throws DiskDoesNotExist
 * @throws FileDoesNotExist
 * @throws FileIsTooBig
 *
 * @return mixed
 */
function storeProfileImage($user, $image)
{
    $mediaId = $user->addMedia($image)
        ->toMediaCollection(User::COLLECTION_PROFILE_PICTURES, config('app.media_disc'))->id;

    return $mediaId;
}

/**
 * @param  User  $user
 * @param  string  $attachment
 *
 * @throws DiskDoesNotExist
 * @throws FileDoesNotExist
 * @throws FileIsTooBig
 *
 * @return mixed
 */
function storeAttachments($user, $attachment)
{
    $media = $user->addMedia($attachment)
        ->toMediaCollection(User::COLLECTION_MAIL_ATTACHMENTS, config('app.media_disc'));

    return $media;
}

/**
 * @param  User  $user
 * @param  string  $image
 *
 * @throws DiskDoesNotExist
 * @throws FileDoesNotExist
 * @throws FileIsTooBig
 *
 * @return mixed
 */
function updateProfileImage($user, $image)
{
    $user->clearMediaCollection(User::COLLECTION_PROFILE_PICTURES);
    $mediaId = $user->addMedia($image)
        ->toMediaCollection(User::COLLECTION_PROFILE_PICTURES, config('app.media_disc'))->id;

    return $mediaId;
}

function getLogoUrl()
{
    static $appLogo;

    if (empty($appLogo)) {
        $appLogo = Setting::where('key', '=', 'app_logo')->first();
    }

    return $appLogo->logo_url;
}

/**
 * @return Department
 */
function getDepartments()
{
    /** @var Department $departments */
    $departments = Department::all()->pluck('name', 'id');

    return $departments;
}

/**
 * @return DoctorDepartment
 */
function getDoctorsDepartments()
{
    /** @var DoctorDepartment $doctorDepartments */
    $doctorDepartments = DoctorDepartment::all()->pluck('title', 'id');

    return $doctorDepartments;
}

/**
 * @return mixed
 */
function getAppName()
{
    static $appName;

    if (empty($appName)) {
        $appName = Setting::where('key', '=', 'app_name')->first()->value;
    }

    return $appName;
}

/**
 * @param  array  $models
 * @param  string  $columnName
 * @param  int  $id
 *
 * @return bool
 */
function canDelete($models, $columnName, $id)
{
    foreach ($models as $model) {
        $result = $model::where($columnName, $id)->exists();
        if ($result) {
            return true;
        }
    }

    return false;
}

/*
 * @return mixed
 */
function getCompanyName()
{
    $companyName = Setting::where('key', '=', 'company_name')->first()->value;

    return $companyName;
}

/**
 * @param $model
 * @param  string  $columnName
 * @param  int  $id
 *
 * @return bool
 */
function canDeletePayroll($model, $columnName, $id)
{
    $result = $model::where($columnName, $id)->exists();
    if ($result) {
        return true;
    }

    return false;
}

/**
 * @return array
 */
function getBloodGroups()
{
    return BloodBank::pluck('blood_group', 'blood_group')->toArray();
}

/**
 * @param  string|null  $currency
 *
 * @return string
 */
function getCurrenciesClass($currency = null)
{
    static $defaultCurrency;

    if (empty($defaultCurrency)) {
        if (! $currency) {
            $defaultCurrency = Setting::where('key', 'current_currency')->first()->value;
        }
    }

    switch ($defaultCurrency) {
        case 'inr':
            return 'fas fa-rupee-sign';
        case 'aud':
            return 'fas fa-dollar-sign';
        case 'usd':
            return 'fas fa-dollar-sign';
        case 'eur':
            return 'fas fa-euro-sign';
        case 'jpy':
            return 'fas fa-yen-sign';
        case 'gbp':
            return 'fas fa-pound-sign';
        case 'cad':
            return 'fas fa-dollar-sign';
        default:
            return 'fas fa-dollar-sign';

    }
}

/**
 * @param  string|null  $currency
 *
 * @return string
 */
function getCurrenciesForSetting($currency = null)
{
    if (! $currency) {
        $defaultCurrency = Setting::where('key', 'current_currency')->first()->value;
    }

    switch ($currency) {
        case 'inr':
            return 'fas fa-rupee-sign';
        case 'aud':
            return 'fas fa-dollar-sign';
        case 'usd':
            return 'fas fa-dollar-sign';
        case 'eur':
            return 'fas fa-euro-sign';
        case 'jpy':
            return 'fas fa-yen-sign';
        case 'gbp':
            return 'fas fa-pound-sign';
        case 'cad':
            return 'fas fa-dollar-sign';
        default:
            return 'fas fa-dollar-sign';
    }
}

/**
 * @param  string|null  $currency
 *
 * @return string
 */
function getCurrencyForPDF($currency = null)
{
    if (! $currency) {
        $currency = Setting::where('key', 'current_currency')->first()->value;
    }

    switch ($currency) {
        case 'inr':
            return 8377;
        case 'aud':
            return 36;
        case 'usd':
            return 36;
        case 'eur':
            return 8364;
        case 'jpy':
            return 165;
        case 'gbp':
            return 163;
        case 'cad':
            return 36;
    }
}

/**
 * @return mixed
 */
function getCurrentCurrency()
{
    /** @var Setting $currentCurrency */
    static $currentCurrency;

    if (empty($currentCurrency)) {
        $currentCurrency = Setting::where('key', 'current_currency')->first();
    }

    return $currentCurrency->value;
}

// number formatted code

/**
 * @param $currencyValue
 *
 * @return string
 */
function formatCurrency($currencyValue)
{
    $amountValue = $currencyValue;
    $currencySuffix = ''; //thousand,lac, crore
    $numberOfDigits = countDigit($amountValue); //this is call :)
    if ($numberOfDigits > 3) {
        if ($numberOfDigits % 2 != 0) {
            $divider = divider($numberOfDigits - 1);
        } else {
            $divider = divider($numberOfDigits);
        }
    } else {
        $divider = 1;
    }

    $formattedAmount = $amountValue / $divider;
    $formattedAmount = number_format($formattedAmount, 2);
    if ($numberOfDigits == 4 || $numberOfDigits == 5) {
        $currencySuffix = 'k';
    }
    if ($numberOfDigits == 6 || $numberOfDigits == 7) {
        $currencySuffix = 'Lac';
    }
    if ($numberOfDigits == 8 || $numberOfDigits == 9) {
        $currencySuffix = 'Cr';
    }

    return $formattedAmount.' '.$currencySuffix;
}

/**
 * @param $number
 *
 * @return int
 */
function countDigit($number)
{
    return strlen($number);
}

/**
 * @param $numberOfDigits
 *
 * @return int|string
 */
function divider($numberOfDigits)
{
    $tens = '1';
    if ($numberOfDigits > 8) {
        return 10000000;
    }

    while (($numberOfDigits - 1) > 0) {
        $tens .= '0';
        $numberOfDigits--;
    }

    return $tens;
}

/**
 * @param  array  $input
 * @param  string  $key
 *
 * @return string|null
 */
function preparePhoneNumber($input, $key)
{
    return (! empty($input[$key])) ? '+'.$input['prefix_code'].$input[$key] : null;
}

/**
 * @param $doctorDepartmentId
 *
 * @return mixed
 */
function getDoctorDepartment($doctorDepartmentId)
{
    return DoctorDepartment::where('id', $doctorDepartmentId)->value('title');
}

/**
 * @param $userOwnerId
 *
 * @return Collection
 */
function getPatientsList($userOwnerId)
{
    $patientCase = PatientCase::with('patient.user')->where('doctor_id', '=',
        $userOwnerId)->where('status', '=', 1)->get()->pluck('patient.user_id', 'id');

    $patientAdmission = PatientAdmission::with('patient.user')->where('doctor_id', '=',
        $userOwnerId)->where('status', '=', 1)->get()->pluck('patient.user_id', 'id');

    $arrayMerge = array_merge($patientAdmission->toArray(), $patientCase->toArray());
    $patientIds = array_unique($arrayMerge);

    $patients = Patient::with('user')->whereIn('user_id', $patientIds)
        ->whereHas('user', function (Builder $query) {
            $query->where('status', 1);
        })->get()->pluck('user.full_name', 'id');

    return $patients;
}

/**
 * @return array
 */
function getCurrencies()
{
    $currencyPath = file_get_contents(storage_path().'/currencies/defaultCurrency.json');
    $currenciesData = json_decode($currencyPath, true);
    $currencies = [];

    foreach ($currenciesData['currencies'] as $currency) {
        $convertCode = strtolower($currency['code']);
        $currencies[$convertCode] = [
            'symbol' => $currency['symbol'],
            'name'   => $currency['name'],
        ];
    }

    return $currencies;
}

/**
 * @return mixed
 */
function getCurrencySymbol()
{
    $currencyPath = file_get_contents(storage_path().'/currencies/defaultCurrency.json');
    $currenciesData = json_decode($currencyPath, true)['currencies'];

    $currencySymbol = collect($currenciesData)->where('code',
        strtoupper(getCurrentCurrency()))->pluck('symbol')->first();

    return $currencySymbol;
}

/**
 * @param $key
 *
 * @return mixed
 */
function getSettingValue($key)
{
    return Setting::where('key', $key)->value('value');
}

function setStripeApiKey()
{
    Stripe::setApiKey(config('services.stripe.secret_key'));
}

/**
 * @param $fileName
 * @param $attachment
 *
 * @return string
 */
function getFileName($fileName, $attachment)
{
    $fileNameExtension = $attachment->getClientOriginalExtension();

    $newName = $fileName.'-'.time();

    return $newName.'.'.$fileNameExtension;
}

/**
 * @param  array  $data
 */
function addNotification($data)
{
    $notificationRecord = [
        'type'             => $data[0],
        'user_id'          => $data[1],
        'notification_for' => $data[2],
        'title'            => $data[3],
    ];

    if ($user = User::find($data[1])) {
        Notification::create($notificationRecord);
    }
}

/**
 * @param  array  $role
 *
 * @return Notification[]|Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|Collection
 */
function getNotification($role)
{
    return Notification::whereUserId(Auth::id())->whereNotificationFor(Notification::NOTIFICATION_FOR[$role])->where('read_at',
        null)->orderByDesc('created_at')->toBase()->get();
}

/**
 * @param  array  $data
 *
 * @return array
 */
function getAllNotificationUser($data)
{
    return array_filter($data, function ($key) {
        return $key != getLoggedInUserId();
    }, ARRAY_FILTER_USE_KEY);
}

/**
 * @param  array  $notificationFor
 *
 * @return string
 */
function getNotificationIcon($notificationFor)
{
    switch ($notificationFor) {
        case 1:
            return 'fas fa-calendar-check';
        case 2:
            return 'fas fa-file-invoice';
        case 3:
            return 'fa fa-rupee-sign';
        case 7:
        case 4:
            return 'fas fa-notes-medical';
        case 5:
            return 'fas fa-stethoscope';
        case 8:
        case 6:
            return 'fas fa-prescription';
        case 9:
            return 'fas fa-diagnoses';
        case 10:
            return 'fas fa-chart-pie';
        case 11:
            return 'fas fa-money-bill-wave';
        case 12:
            return 'fas fa-user-injured';
        case 13:
            return 'fa fa-briefcase-medical';
        case 14:
            return 'fa fa-users';
        case 15:
            return 'fa fa-clipboard';
        case 16:
            return 'fas fa-user-plus';
        case 17:
            return 'fas fa-ambulance';
        case 18:
            return 'fas fa-box';
        case 19:
            return 'fas fa-wallet';
        case 20:
            return 'fas fa-money-check';
        case 21:
            return 'fa fa-video';
        case 22:
            return 'fa fa-file-video';
        default:
            return 'fa fa-inbox';
    }
}

/**
 *
 * @return string[]
 */
function getLanguages()
{
    return User::LANGUAGES;
}

/**
 * @return mixed|null
 */
function checkLanguageSession()
{
    if (Session::has('languageName')) {
        return Session::get('languageName');
    }

    return 'en';
}

/**
 * @return mixed|null
 */
function getCurrentLanguageName()
{
    return getLanguages()[checkLanguageSession()];
}

/*
 * @param $input
 *
 * @param  null  $vaccinatedPatient
 * @param  null  $isCreate
 * @return bool
 */
function checkVaccinatePatientValidation($input, $vaccinatedPatient = null, $isCreate = null)
{
    $patients = VaccinatedPatients::where('patient_id', $input['patient_id'])->get();
    $returnValue = false;
    if ($isCreate) {
        if ($input['patient_id'] != $vaccinatedPatient->patient_id) {
            $patients = VaccinatedPatients::where('patient_id', '!=', $vaccinatedPatient->patient_id)->get();
        }
    }

    foreach ($patients as $patient) {
        if ($input['patient_id'] == $patient->patient_id &&
            $input['vaccination_id'] == $patient->vaccination_id &&
            $input['dose_number'] == $patient->dose_number) {
            $returnValue = true;
            break;
        }
    }

    return $returnValue;
}
