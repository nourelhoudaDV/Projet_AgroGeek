<?php

namespace App\Http\Requests\Fermes;

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
            'nomDomaine' => 'required|string|max:150',
            'fullNameG' => 'required|string|max:150',
            'cin' => 'required|string|max:15',
            'contactG' => 'string|max:15',
            'SAT' => 'string|max:15',
            'contactG' => 'string|max:15',
            'SAU' => 'string|max:15',
            'observation' => 'string|max:255',
            'fixe' => 'string|max:15',
            'fax' => 'string|max:15',
            'GSM1' => 'string|max:15',
            'GSM2' => 'string|max:15',
            'email' => 'string|max:150',
            'siteWeb' => 'string|max:150',
            'email' => 'string|max:150',
            'Douar' => 'string|max:100',
            'Cercle' => 'string|max:100',
            'province' => 'string|max:100',
            'region' => 'string|max:100',
            'adresse' => 'string|max:255',
            'gps' => 'string|max:255',
            'ville' => 'string|max:100',
            // 'avatar' =>  $this->request->get('avatar-preview') !== null ? 'nullable' :  'required' . '|image|mimes:jpeg,png,jpg|max:2048',
            'logo' =>  $this->request->get('logo-preview') !== null ? 'nullable' :  'required' . '|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
