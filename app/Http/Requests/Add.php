<?php

namespace App\Http\Requests;

use App\Models\EspecesModel;
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
            'nom' => 'required|max:150' . EspecesModel::PK,
            'nomCommercial' => 'string|max:150',
            'appelationAr' => 'string|max:150',
            'categorieEspece' => 'string|max:100',
            'typeEnracinement' => 'string|max:150',
            'description' => 'string|max:150',
        ];
    }
}