<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            "brgy" => ['string', 'max:100'],
            "city_mun" => ['string', 'max:100'],
            "prov" => ['string', 'max:100'],
            'contact_no' => ['string', 'max:100', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'dept' => ['string', 'max:10'],
            'sss' => ['string', 'max:50', Rule::unique(User::class)->ignore($this->user()->id)],
            'tin' => ['string', 'max:50', Rule::unique(User::class)->ignore($this->user()->id)],
            'philhealth' => ['string', 'max:50', Rule::unique(User::class)->ignore($this->user()->id)],
            "type" => ['string', 'max:10'],
        ];
    }
}
