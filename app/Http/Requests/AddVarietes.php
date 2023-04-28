<?php

namespace App\Http\Requests;

use App\Models\Espece;
use App\Models\Variete;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddVarietes extends FormRequest
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
            'espece' => 'nullable|exists:especes,' . Espece::PK,
            'nomCommercial' => 'string|max:150',
            'appelationAr' => 'string|max:150',
            'quantite' => 'string|max:100',
            'precocite' => 'string|max:150',
            'resistance' => 'string|max:150',
            'competitivite' => 'string|max:150',
            'description' => 'string|max:150',
        ];
    }
}