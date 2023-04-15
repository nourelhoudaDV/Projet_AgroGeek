<?php

namespace App\Http\Requests\Typesols;

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

//        dd(
//          $this->all()
//        );



        return   [
            'vernaculaure' => 'required|string|max:150',
            'nomDomaine' => 'nullable|string|max:150',
            'teneurLimon' => 'nullable|string',
            'teneurSable' => 'nullable|string',
            'teneurAgile' => 'nullable|string',
            'teneurPhosphore' => 'nullable|string',
            'teneurPotassiume' => 'nullable|string',
            'teneurAzote' => 'nullable|string',
            'calcaireActif' => 'nullable|string',
            'calcaireTotal' => 'nullable|string',
            'conductiviteElectrique' => 'nullable|string',
            'HCC' => 'nullable|string',
            'HPF' => 'nullable|string',
            'DA' => 'nullable|string'
        ];
    }
}
