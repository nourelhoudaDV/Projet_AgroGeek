<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEspece extends FormRequest
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
            'nomSc' => 'required|string|max:150',
            'nomCommercial' => 'required|string|max:150',
            'appelationAr' => 'nullable|string|max:150',
            'categorieEspece' => 'required|string|max:100',
            'typeEnracinement' => 'nullable|string|max:150',
            'description' => 'nullable|string',
        ];
    }
}
