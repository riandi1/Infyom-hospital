<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Department;
use App\Models\Pharmacist;
use App\Models\User;
use Exception;
use Hash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class PharmacistRepository
 * @version February 14, 2020, 9:32 am UTC
 */
class PharmacistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
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
        return Pharmacist::class;
    }

    /**
     * @param  array  $input
     *
     * @param  bool  $mail
     * @return bool
     */
    public function store($input, $mail = true)
    {
        try {
            $input['department_id'] = Department::whereName('Pharmacist')->first()->id;
            $input['password'] = Hash::make($input['password']);
            $input['dob'] = (! empty($input['dob'])) ? $input['dob'] : null;
            $input['phone'] = preparePhoneNumber($input, 'phone');

            $user = User::create($input);
            if ($mail) {
                $user->sendEmailVerificationNotification();
            }

            if (isset($input['image']) && ! empty($input['image'])) {
                $mediaId = storeProfileImage($user, $input['image']);
            }

            $pharmacist = Pharmacist::create(['user_id' => $user->id]);
            $ownerId = $pharmacist->id;
            $ownerType = Pharmacist::class;

            if (! empty($address = Address::prepareAddressArray($input))) {
                Address::create(array_merge($address, ['owner_id' => $ownerId, 'owner_type' => $ownerType]));
            }

            $user->update(['owner_id' => $ownerId, 'owner_type' => $ownerType]);
            $user->assignRole($input['department_id']);
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        return true;
    }

    /**
     * @param  array  $input
     * @param  Pharmacist  $pharmacist
     *
     * @return bool
     */
    public function update($input, $pharmacist)
    {
        try {
            unset($input['password']);

            $user = User::find($pharmacist->user->id);
            if (isset($input['image']) && ! empty($input['image'])) {
                $mediaId = updateProfileImage($user, $input['image']);
            }

            /** @var Pharmacist $pharmacist */
            $input['dob'] = (! empty($input['dob'])) ? $input['dob'] : null;
            $input['phone'] = preparePhoneNumber($input, 'phone');
            $pharmacist->user->update($input);
            $pharmacist->update($input);

            if (! empty($pharmacist->address)) {
                if (empty($address = Address::prepareAddressArray($input))) {
                    $pharmacist->address->delete();
                }
                $pharmacist->address->update($input);
            } else {
                if (! empty($address = Address::prepareAddressArray($input)) && empty($pharmacist->address)) {
                    $ownerId = $pharmacist->id;
                    $ownerType = Pharmacist::class;
                    Address::create(array_merge($address, ['owner_id' => $ownerId, 'owner_type' => $ownerType]));
                }
            }
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        return true;
    }
}
