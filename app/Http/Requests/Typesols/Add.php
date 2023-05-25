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

    //    dd(
    //      $this->all()
    //    );



        return   [
            'vernaculaure' => 'required|string|max:150',
            'nomDomaine' => 'nullable|string|max:150',
            'teneurLimon' => 'nullable|numeric',
            'teneurSable' => 'nullable|numeric',
            'teneurArgile' => 'nullable|numeric',
            'teneurPhosphore' => 'nullable|numeric',
            'teneurPotassiume' => 'nullable|numeric',
            'teneurAzote' => 'nullable|numeric',
            'calcaireActif' => 'nullable|numeric',
            'calcaireTotal' => 'nullable|numeric',
            'conductiviteElectrique' => 'nullable|numeric',
            'HCC' => 'nullable|numeric',
            'HPF' => 'nullable|numeric',
            'DA' => 'nullable|numeric',
            'ferme'=>'nullable|exists:fermes,idF'
        ];
    }
}
