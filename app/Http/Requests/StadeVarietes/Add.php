<?php

namespace App\Http\Requests\StadeVarietes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Add extends FormRequest
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

        return   [
            'nom' => 'required|string|max:150',
            'phaseFin' => 'required|string|max:150',
            'espece' => 'required|string',
            'variete' => 'required|string',
            'sommesTemps' => 'required|string',
            'sommesTempFroid' => 'required|string',
            'Kc' => 'required|string',
            'enracinement' => 'required|string',
            'maxEnracinement' => 'required|string|max:1',
            'description' => 'nullable|string',
        ];
    }
}
