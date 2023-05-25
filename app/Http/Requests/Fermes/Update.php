<?php

namespace App\Http\Requests\Fermes;

use App\Models\Ferme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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

        $id=request('idF');


        return   [
            'nomDomaine' => 'required|string|max:150',
            'fullNameG' => 'required|string|max:150',
            
            'cin' => ['required', 'max:10', 'string',  
            function ($attribute, $value, $fail) use ($id) { 
                $o = Ferme::query()    
                                ->where(Ferme::PK, '!=', $id)                         
                                ->where('cin', $value)                         
                                ->first();                      
                                if (isset($o)) {                         
                                    $fail(__('validation.unique', ['attribute' => $attribute]));                     
                                }                 
                            }],
            'contactG' => 'nullable|string|max:15',
            'SAT' => 'nullable|string|max:15',
            'contactG' => 'nullable|string|max:15',
            'SAU' => 'nullable|string|max:15',
            'observation' => 'nullable|string|max:255',
            'fixe' => 'nullable|string|max:15',
            'fax' => 'nullable|string|max:15',
            'GSM1' => 'nullable|string|max:15',
            'GSM2' => 'nullable|string|max:15',
            'email' => 'nullable|string|max:150',
            'siteWeb' => 'nullable|string|max:150',
            'email' => 'nullable|string|max:150',
            'Douar' => 'nullable|string|max:100',
            'Cercle' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'adresse' => 'nullable|string|max:255',
            'gps' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:100',
            'logo' =>   $this->image('logo') . 'image|mimes:jpeg,png,jpg|max:2048'

        ];
    }

    private function image($name): string
    {
        return $this->request->get("$name-preview") !== null ? 'nullable|' : 'nullable|';
    }
}
