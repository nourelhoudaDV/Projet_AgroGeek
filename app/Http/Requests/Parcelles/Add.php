<?php

namespace App\Http\Requests\Parcelles;

use App\Models\Ferme;
use App\Models\Typesol;
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
            'codification' => 'nullable|string|max:50',
            'Ferme' => 'required|exists:fermes,'.Ferme::PK,
            'superficie' => 'required|string|max:15',
            'modeCulture' => 'required|string',
            'topographie' => 'nullable|string|max:255',
            'pente' => 'nullable|string',
            'pierosite' => 'nullable|string',
            'gps' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'typeSol' => 'nullable|exists:typesols,'.Typesol::PK,
        ];
    }
}
