<?php

namespace App\Http\Requests;

use App\Models\Pharmacist;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePharmacistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Pharmacist::$rules;
        $rules['email'] = 'required|email:filter|unique:users,email,'.$this->route('pharmacist')->user->id;

        return $rules;
    }
}
