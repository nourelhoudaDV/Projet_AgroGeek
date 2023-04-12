<?php

namespace App\Http\Requests\Varietes;

use App\Models\Variete;
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
            'espece' => 'required|string',
            'nomCommercial' => 'required|string|max:150',
            'appelationAr' => 'nullable|string|max:150',
            'quantite' => 'nullable|string|max:100',
            'precocite' => 'nullable|string|max:150',
            'resistance' => 'nullable|string|max:150',
            'competitivite' => 'nullable|string|max:150',
            'description' => 'nullable|string|max:150',
        ];
    }
}
