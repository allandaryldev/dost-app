<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class CreateUser extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required','string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'last_name' => ['required','string', 'max:255'],
            'bday' => ['required','date', 'max:255'],
            "brgy" => ['required','string', 'max:100'],
            "city_mun" => ['required', 'string', 'max:100'],
            "prov" => ['required','string', 'max:100'],
            'contact_no' => ['required','string', 'max:100',"unique:App\Models\User,contact_no"],
            'email' => ['required', 'email', 'max:255', "unique:App\Models\User,email"],
            'dept' => ['required', 'string', 'max:10'],
            'sss' => ['string', 'max:50', "unique:App\Models\User,sss"],
            'tin' => ['string', 'max:50', "unique:App\Models\User,tin"],
            'philhealth' => ['string', 'max:50', "unique:App\Models\User,philhealth"],
            "type" => ['required','string', 'max:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
