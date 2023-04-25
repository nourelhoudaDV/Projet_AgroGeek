<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGrantFermesRequet extends FormRequest
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
            'nomG' => 'required|string|max:100',
            'prenomG' => 'required|string|max:100',
            'telephone' => 'nullable|string|max:100',
            'cin' => 'nullable|string|max:100',
            'email' => 'nullable|string|max:100',


        ];
    }
}
