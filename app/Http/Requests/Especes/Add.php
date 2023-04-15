<?php

namespace App\Http\Requests\Especes;

use App\Models\Espece;
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


        return [
            'nomSc' => 'required|max:150',
            // 'nom' => 'required|max:150' . Espece::PK,
            'nomCommercial' => 'nullable|string|max:150',
            'appelationAr' => 'nullable|string|max:150',
            'categorieEspece' => 'nullable|string|max:100',
            'typeEnracinement' => 'nullable|string|max:150',
            'description' => 'nullable|string|max:150',
        ];
    }
}
